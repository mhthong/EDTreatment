<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\SimpleSliderController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MenuController;

use App\Http\Controllers\StaticPostsController;

use App\Http\Controllers\SlidersController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InforCompanyController;
use App\Models\Informations;
use App\Http\Controllers\FormContactController;

use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\SettingConfigurationController;

use App\Http\Controllers\SettingController;

use App\Models\SettingConfiguration;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\EmailConfigurationController;
use App\Models\Tags;
use CKSource\CKFinderBridge\Controller\CKFinderController;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;
use App\Http\Controllers\TagsController;
use App\Models\StaticPosts;
use App\Http\Controllers\SitemapController;
use  App\Http\Controllers\SlugController;
use Spatie\Analytics\AnalyticsFacade as Analytics; //Change here
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/data', function () {
    $test = Analytics::fetchMostVisitedpages(Period::days(7));
    dd($test);
});
/* Route::get('/', [PublicController::class, 'Home'] ); */

Route::get('', function () {
    return view('playout');
});




/* Route::get('caretoties/{slug}', [SlugController::class, 'index'])->name('slug'); */

Route::get('/home', [PublicController::class, 'Home']);

Route::get('/generate', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

Route::get('product-detail/{table}-{id}',  [PublicController::class, 'show'])->name('product-detail');

Auth::routes();


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('forgot-password');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



Route::middleware('auth:user')->prefix('user')->group(
    function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    }

);

Route::get('/login',  [LoginController::class, 'showLoginForm']);
Route::post('/login',  [LoginController::class, 'login'])->name('login');

Route::post('email', [EmailConfigurationController::class, 'sendEmail'])->name('composer.email');

Route::middleware('auth:admin')->prefix('admin')->group(
    function () {
        Route::get('/',  [AdminController::class, 'index'])->name('dashboard');;
        Route::get('/your-setting',  [AdminController::class, 'YourSetting'])->name('your-setting');
        Route::post('/reset-password',  [AdminController::class, 'ResetPassword'])->name('reset-password');

        Route::post('insert-new', [NewsController::class, 'Insert_New'])->name('ckeditor.upload');

        /*
        FormContact */
        Route::get('FormContact',  [FormContactController::class, 'FormContact'])->name('FormContact-admin');
        Route::get('search',  [FormContactController::class, 'search'])->name('search');
        Route::get('FormContact/{id}',  [FormContactController::class, 'show'])->name('FormContact.show');
        Route::DELETE('FormContact/delete/{id}',  [FormContactController::class, 'destroy'])->name('FormContact.delete');




        Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
        /*  */
        Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);


        ////



        Route::get('simple-slider',  [SimpleSliderController::class, 'SimpleSlider'])->name('simple-slider');
        Route::get('simple-slider/edit/{id}', [SimpleSliderController::class, 'edit'])->name('SimpleSlider.edit');
        Route::post('update-simple-slider/{id}', [SimpleSliderController::class, 'update'])->name('update-simple-slider');
        Route::DELETE('simple-slider-item/delete/{id}',  [SimpleSliderController::class, 'destroy'])->name('simple-slider-item.delete');
        Route::post('update-simple-slider-item/{id}', [SimpleSliderController::class, 'updateitem'])->name('update-simple-slider-item');
        Route::post('created-simple-slider-item/{id_simple}', [SimpleSliderController::class, 'createditem'])->name('created-simple-slider-item');

        //caregory
        Route::prefix('category')->group(
            function () {
                Route::get('/',  [MenuController::class, 'index'])->name('category');
                Route::post('category-post', [MenuController::class, 'store'])->name('category-up');
                Route::DELETE('delete/{id}',  [MenuController::class, 'destroy'])->name('category.delete');
                Route::post('update-menu/{id}', [MenuController::class, 'update'])->name('update-menu');
            }
        );

        Route::prefix('contacts')->group(
            function () {
                Route::get('/',  [StaticPostsController::class, 'index'])->name('statics');
                Route::get('create', [StaticPostsController::class, 'create_index'])->name('static.create');
                Route::post('store', [StaticPostsController::class, 'store'])->name('static-store');
                Route::DELETE('delete/{id}',  [StaticPostsController::class, 'destroy'])->name('statics.delete');
            }
        );

        Route::prefix('cars')->group(

            function(){
                Route::get('/', [CarController::class, 'index'])->name('cars.index');
                Route::get('/create', [CarController::class, 'create'])->name('cars.create');
                Route::post('', [CarController::class, 'store'])->name('cars.store');
                Route::get('/{car}', [CarController::class, 'show'])->name('cars.show');
                Route::get('/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
                Route::put('/{car}/{detail}', [CarController::class, 'update'])->name('cars.update');
                Route::delete('/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

            }
        );



        Route::prefix('pages')->group(
            function () {
                Route::get('/',  [BlockController::class, 'index'])->name('blocks');
                Route::get('create', [BlockController::class, 'create_index'])->name('block.create');
                Route::post('store', [BlockController::class, 'store'])->name('block-store');
                Route::DELETE('delete/{id}',  [BlockController::class, 'destroy'])->name('blocks.delete');
                Route::get('edit/{id}', [BlockController::class, 'edit'])->name('blocks.edit');
                Route::post('update-block/{id}', [BlockController::class, 'update'])->name('blocks.update');
                Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
                    \UniSharp\LaravelFilemanager\Lfm::routes();
                });
                /*  */
                Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);
            }
        );



        Route::prefix('blocks')->group(
            function () {
                Route::get('/',  [StaticPostsController::class, 'index'])->name('statics');
                Route::get('create', [StaticPostsController::class, 'create_index'])->name('static.create');
                Route::post('store', [StaticPostsController::class, 'store'])->name('static-store');
                Route::DELETE('delete/{id}',  [StaticPostsController::class, 'destroy'])->name('statics.delete');
                Route::get('edit/{id}', [StaticPostsController::class, 'edit'])->name('statics.edit');
                Route::post('update-static/{id}', [StaticPostsController::class, 'update'])->name('statics.update');
                Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
                    \UniSharp\LaravelFilemanager\Lfm::routes();
                });
                /*  */
                Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);
            }
        );



        Route::prefix('posts')->group(
            function () {
                Route::get('/',  [PostController::class, 'index'])->name('posts');
                Route::get('create', [PostController::class, 'create_index'])->name('create');
                Route::post('store', [PostController::class, 'store'])->name('posts-up');
                Route::DELETE('delete/{id}',  [PostController::class, 'destroy'])->name('posts.delete');
                Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit-posts');
                Route::post('update-posts/{id}', [PostController::class, 'update'])->name('update-posts');
                Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
                    \UniSharp\LaravelFilemanager\Lfm::routes();
                });
                /*  */
                Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);
            }
        );

        Route::prefix('tags')->group(
            function () {
                Route::get('/',  [TagsController::class, 'index'])->name('tags');
                Route::get('create', [TagsController::class, 'create_index'])->name('tag-create');
                Route::post('store', [TagsController::class, 'store'])->name('tag-store');
                Route::DELETE('delete/{id}',  [TagsController::class, 'destroy'])->name('tag.delete');
                Route::get('edit/{id}', [TagsController::class, 'edit'])->name('edit-tag');
                Route::post('update-tag/{id}', [TagsController::class, 'update'])->name('update.tag');

                Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
                    \UniSharp\LaravelFilemanager\Lfm::routes();
                });
                /*  */
                Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);
            }
        );


        Route::prefix('theme')->group(
            function () {
                Route::get('option',  [SettingController::class, 'SettingValue'])->name('setting');
                Route::post('option-post', [SettingController::class, 'Setting'])->name('setting-up');

                Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
                    \UniSharp\LaravelFilemanager\Lfm::routes();
                });
                /*  */
                Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);
            }
        );

        Route::prefix('setting')->group(
            function () {
                Route::get('general',  [SettingController::class, 'general'])->name('general');
                Route::post('general-post', [SettingController::class, 'Setting'])->name('general.post');

                Route::get('email',  [SettingController::class, 'email'])->name('email');
                Route::post('email-post', [SettingController::class, 'Setting'])->name('email.post');
                /* email */
                Route::post('compose-email', [EmailConfigurationController::class, 'sendEmail_ad'])->name('compose-email-form');




                Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
                    \UniSharp\LaravelFilemanager\Lfm::routes();
                });
                /*  */
                Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index']);
            }
        );
    }

);

/* email */
Route::post('compose-email', [EmailConfigurationController::class, 'sendEmail_ad'])->name('compose-email-form');
/* InformationController */

/* Contacts */
Route::get('contact', [ContactsController::class, 'edit'])->name('contact.edit');
Route::post('update-contact', [ContactsController::class, 'update'])->name('contacts.update');

/* news */

/* Route::get('add-blog-post-form', [PostController::class, 'index']); */
Route::get('informations-post',  [InformationController::class, 'Post'])->name('informations-post');
Route::post('insert-informations', [InformationController::class, 'Insert'])->name('informations.upload');
/* Route::get('news/{tittle}{id}', [PublicController::class, 'show'])->name('news_detail')->where('id", "[0-9]+"); */

## /routes/web.php ckfinder
/* Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
 */
//Route::any('/ckfinder/examples/{example?}', '\CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
//    ->name('ckfinder_examples');



Route::prefix('caretoties')->group(
    function () {
        Route::get('{slug}', [SitemapController::class, 'caretoties'])->name('caretoties');
    }
);

Route::prefix('post')->group(
    function () {
        Route::get('{slug}', [SitemapController::class, 'post'])->name('post');
    }
);


Route::prefix('page')->group(
    function () {
        Route::get('{slug}', [SitemapController::class, 'page'])->name('page');
    }
);


