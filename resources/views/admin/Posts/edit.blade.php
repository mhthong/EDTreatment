
@extends('admin.app')

@section('sidebar')
    @include('layouts.sidebar-admin')
@endsection

@section('main')
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        @include('layouts.navbar-admin')
        <!-- NAVBAR -->

        @include('admin.Notifications')
        <!-- MAIN -->
        <main>
            <div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Posts</a>
						</li>
					</ul>
				</div>

			</div>


            <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
            id="add-blog-post-form" method="post" action="{{ route('update-posts', ['id'=>$Posts->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="table-data">
                <div class="order">
                    <div class="containerInput  twothirds p-3">
                        <label for="name mt-0">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="" required
                            value="{{$Posts->name}}" required />

                        <label for="name">Tiêu đề</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="" required
                            value="{{$Posts->title}}" required />

                            <label for="name">Mô tả</label>
                        <textarea cols="30" rows="3" type="text" name="description" id="description" placeholder="" required>{{$Posts->description}}</textarea>


                        <label for="is_featured" class="control-label">Nổi bật?</label>
                        @if ($Posts->target == 1)
                        <label class="switch">
                            <input class="form-control" type="hidden" name="is_featured" value="0">
                            <input class="form-control" type="checkbox" name="is_featured" class="onoffswitch-checkbox"
                                id="is_featured" value="1" checked>
                            <span class="slider"></span>
                        </label>
                        @else
                        <label class="switch">
                            <input class="form-control" type="hidden" name="is_featured" value="0" checked>
                            <input class="form-control" type="checkbox" name="is_featured" class="onoffswitch-checkbox"
                                id="is_featured" value="1">
                            <span class="slider"></span>
                        </label>
                        @endif


                        <label for="name">Nội dung</label>
                        <textarea cols="2" rows="2" name="content" id="editor1" placeholder="Nội dung" required value="">{{$Posts->content}}</textarea>
                    </div>

                    <div class=" containerInput twothirds p-3 mt-3">
                        <div class="widget-body">
                            <div class="flexb-c" style="justify-content: space-between">
                                <h4><span>Tối ưu hoá bộ máy tìm kiếm (SEO)</span></h4>
                                <a href="#seo-preview-show" class="btn-trigger-show-seo-detail text-primary">Chỉnh sửa
                                    SEO</a>
                            </div>
                            <div class="seo-preview" id="seo-preview-show">
                                <p class="default-seo-description ">Thiết lập các thẻ mô tả giúp người dùng dễ
                                    dàng tìm thấy trên công cụ tìm kiếm như Google.</p>
                                <div class="existed-seo-meta  hidden ">
                                    <span class="page-title-seo">

                                    </span>

                                    <div class="page-url-seo ws-nm">
                                        <p>{{ env('APP_URL') }}</p>
                                    </div>

                                    <div class="ws-nm">
                                        <span style="color: #70757a;">Feb 20, 2023 - </span>
                                        <span class="page-description-seo">

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="seo-edit-section hidden">
                                <hr>
                                <div class="form-group">
                                    <label for="seo_title" class="control-label">Tiêu đề trang</label>
                                    <input class="form-control" id="seo_title" placeholder="Tiêu đề trang"
                                        data-counter="120" name="seo_meta[seo_title]" type="text"
                                        value="">
                                </div>


                                <div class="form-group">
                                    <label for="seo_description" class="control-label">Mô tả trang</label>
                                    <textarea class="form-control" rows="3" id="seo_description" placeholder="Mô tả trang" data-counter="160"
                                        name="seo_meta[seo_description]" cols="50"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="">
                        <div class="widget meta-boxes form-actions form-actions-default action-horizontal ">
                            <div class="widget-title">
                                <h4>
                                    <span>Xuất bản</span>
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="btn-set">
                                    <button type="submit" name="submit" value="save" class="btn btn-info">
                                        <i class="fa fa-save"></i> Lưu
                                    </button>
                                    &nbsp;
                                    <button type="submit" name="submit" value="apply"
                                        class="btn btn-success">
                                        <i class="fa fa-check-circle"></i> Lưu &amp; chỉnh sửa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="status" class="m-0 control-label required"
                                        aria-required="true">Trạng
                                        thái</label></h4>
                            </div>
                            <div class="widget-body p-3">
                                <div class="ui-select-wrapper form-group">
                                    <select class="form-control ui-select ui-select" id="status"
                                        name="status">
                                        @isset($Posts->status)
                                        @if ($Posts->status == 'published')
                                            <option value="published" selected="selected">Published</option>
                                            <option value="draft">Bản nháp</option>
                                            <option value="pending">Đang chờ xử lý</option>
                                        @endif

                                        @if ($Posts->status == 'draft')
                                            <option value="published">Published</option>
                                            <option value="draft" selected="draft">Bản nháp</option>
                                            <option value="pending">Đang chờ xử lý</option>
                                        @endif

                                        @if ($Posts->status == 'pending')
                                            <option value="published">Published</option>
                                            <option value="draft" >Bản nháp</option>
                                            <option value="pending" selected="pending">Đang chờ xử lý</option>
                                        @endif
                                    @endisset
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="categories[]" class="control-label required m-0"
                                        aria-required="true">Chuyên mục</label></h4>
                            </div>
                            <div class="widget-body"
                                style=" max-height: 400px;
                            overflow: auto;
                            padding-left: 10px;">
                                @isset($data)
                                    @isset($data['Menus_parent'])

                                        @foreach ($data['Menus_parent'] as $Menus => $Menu )

                                            @foreach ($Menu as $Menus_name)
                                                <li class="checkbox-style ps-0" value="{{ $Menus_name->id }}"
                                                    data-tab="" style="">
                                                    <label for="">

                                                            @isset($menu_check[$Menus_name->id])
                                                                @foreach ($menu_check as $key=>$value)
                                                                    @if ($value->id == $Menus_name->id)
                                                                    <input type="checkbox" value="{{$value->id}}"
                                                                    name="categories[]" checked>
                                                                    @endif
                                                                @endforeach
                                                            @endisset

                                                            @empty($menu_check[$Menus_name->id])
                                                            <input type="checkbox" value="{{$Menus_name->id}}" name="categories[]">
                                                            @endempty
                                                        {{ $Menus_name->name }}
                                                    </label>
                                                </li>
                                                    @isset($data['parent_id'][$Menus_name->id])

                                                    @if (is_array($data['parent_id'][$Menus_name->id]) || is_object($data['parent_id'][$Menus_name->id]))

                                                        @foreach ( $data['parent_id'][$Menus_name->id] as $parent_id => $mp_value)
                                                        <li class="checkbox-style ps-0" value="{{ $mp_value }}"
                                                            data-tab="" style="">
                                                            <label class="ps-4" for="">

                                                                @isset($menu_check[$mp_value])
                                                                    @foreach ($menu_check as $key => $value)

                                                                        @if ($value->id ==  $mp_value )
                                                                        <input type="checkbox" value="{{$value->id }}" name="categories[]" checked>
                                                                        @endif

                                                                    @endforeach
                                                                @endisset
                                                                @empty($menu_check[$mp_value])
                                                                    <input type="checkbox" value="{{ $mp_value }}" name="categories[]" >
                                                                @endempty

                                                                {{ $data['Menu_child_name'][$mp_value] }}
                                                            </label>
                                                        </li>
                                                        @endforeach
                                                    @endif

                                                    @endisset

                                            @endforeach
                                        @endforeach

                                    @endisset
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="image" class="control-label required m-0"
                                        aria-required="true">Hình ảnh (600*400 px)</label></h4>
                            </div>
                            <div class="widget-body">
                                <div class="form-group ">
                                    <div class="holder image-category" id="image-category" value="">
                                        <img src="{{ asset($Posts->image) }}" alt="">
                                    </div>
                                    <div class="-space-y-px mb-4">
                                        <div class="containerInput input-group">
                                            <span class="input-group-btn ">
                                                <a class="text-primary" id="image_manager" data-input="image"
                                                    data-preview="image-category">
                                                    Chọn ảnh
                                                </a>
                                            </span>

                                            <input class="form-control" id="image" value="{{ asset($Posts->image) }}" style="display: none"
                                                type="text" name="image" >
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">


                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="tag[]" class="control-label required m-0"
                                        aria-required="true">Từ khóa</label></h4>
                            </div>
                            <div class="widget-body">
                                <tags class="tagify tags"  tabindex="-1">
                                    <span contenteditable="" data-placeholder="Write some tags"
                                        aria-placeholder="Write some tags" class="tagify__input"
                                        role="textbox" aria-autocomplete="both"
                                        aria-multiline="false"></span>
                                </tags>
                                <input class="tags" data-role="tagsinput" placeholder="Write some tags"
                                    data-url="https://phelieu.com.vn/tl-admin/blog/tags/all" name="tag"
                                    type="text" value="{{$Posts->tag}}" id="tag">
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </form>

        </main>
    </section>
@endsection


@section('script')
        <script src={{ asset('ckeditor/ckeditor.js') }}></script>

        <script>
            var options = {
                filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
/*                 filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form' */
            };
        </script>
        <script>
            CKEDITOR.replace('editor1', options);
            /*  $('textarea.editor1').ckeditor(options); */
        </script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
            var route_prefix = "/admin/laravel-filemanager";
            $('#lfm').filemanager('image', {
                prefix: route_prefix
            });
            $('#image_manager').filemanager('image', {
                prefix: route_prefix
            });
            $('#data-image').filemanager('image', {prefix: route_prefix});
        </script>

        <script>
            $(".btn-trigger-show-seo-detail").click(function() {
                $('.seo-edit-section').toggleClass('hidden-active');
            });
        </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js" defer></script>


    @endsection
