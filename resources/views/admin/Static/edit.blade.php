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
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Static</a>
                        </li>
                    </ul>
                </div>
            </div>

            @isset($Statics)

                <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
                    id="add-blog-post-form" method="post" action="{{ route('statics.update', ['id' => $Statics->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="table-data">
                        <div class="order">
                            <div class="containerInput  twothirds p-3">
                                <label for="name mt-0">Name</label>
                                <input type="text" name="name" id="name" placeholder="" required
                                    value="{{ $Statics->name }}" required />
                                <label for="name">Mô tả</label>
                                <textarea cols="30" rows="3" type="text" name="description" id="description" placeholder="" required>{{ $Statics->description }}</textarea>
                                <div class="form-group">
                                    <label for="alias" class="control-label required" aria-required="true">Mã thay
                                        thế</label>
                                    <input class="form-control is-valid" placeholder="Mã thay thế" data-counter="120"
                                        readonly="" name="alias" type="text" value="{{ $Statics->alias }}"
                                        id="alias" aria-invalid="false" aria-describedby="alias-error">
                                </div>


                                <label for="name">Nội dung</label>
                                <textarea cols="2" rows="2" name="content" id="editor1" placeholder="Nội dung" required value="">{{ $Statics->content }}</textarea>
                            </div>

                            @if ($Statics->alias === 'pricelist-tow')
                                <div class="containerInput  twothirds p-3 mt-3">
                                    <div class="-space-y-px mb-4">
                                        <div class="containerInput ">
                                            <div class="widget-title">
                                                <h4>
                                                    <span>Bảng giá</span>
                                                </h4>
                                            </div>
                                            <div class="form-group ">
                                                <label for="pricelist" class="control-label">
                                                    Bảng giá
                                                </label>
                                                <div class="repeater">
                                                    <div data-repeater-list="pricelist">
                                                        @foreach (json_decode($Statics->pricelist) as $key => $value)
                                                            <div data-repeater-item class="data-repeater-item">
                                                                <div class="form-group data-repeater-form flexb-c">
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Loại
                                                                                xe</label>
                                                                            <input class="form-control me-3" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->type }}" name="type"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Phí
                                                                                bóc xếp hai đầu</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->price }}" name="price"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <span data-repeater-delete type="button"
                                                                    class="remove-item-button">
                                                                    <i class="fa fa-times"></i>
                                                                </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <input data-repeater-create type="button" class="bg-add form-control"
                                                        style="width:100px;" value="Add New" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($Statics->alias === 'pricelist')
                                <div class="containerInput  twothirds p-3 mt-3">
                                    <div class="-space-y-px mb-4">
                                        <div class="containerInput ">
                                            <div class="widget-title">
                                                <h4>
                                                    <span>Bảng giá</span>
                                                </h4>
                                            </div>
                                            <div class="form-group ">
                                                <label for="pricelist" class="control-label">
                                                    Bảng giá
                                                </label>
                                                <div class="repeater">
                                                    <div data-repeater-list="pricelist">

                                                        @foreach (json_decode($Statics->pricelist) as $key => $value)
                                                            <div data-repeater-item class="data-repeater-item">
                                                                <div class="form-group data-repeater-form flexb-c">
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Loại
                                                                                xe</label>
                                                                            <input class="form-control me-3" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->type }}" name="type"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Kích
                                                                                thước xe</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->size }}" name="size"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Giá
                                                                                mở cửa 10km đầu</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->value }}" name="value"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label
                                                                                for="f2c6be2ae579c0933ac1457f64a44c1b">km11-km50</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->price10 }}" name="price10"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label
                                                                                for="f2c6be2ae579c0933ac1457f64a44c1b">51-100km</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->price51_100 }}"
                                                                                name="price51_100" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Trên
                                                                                100km</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->price100 }}"
                                                                                name="price100" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Thời
                                                                                gian chờ ( Đơn vị đ/giờ )</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->time }}" name="time"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="me-3">
                                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Lưu
                                                                                đêm</label>
                                                                            <input class="form-control" data-counter="40"
                                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                                                value="{{ $value->save_night }}"
                                                                                name="save_night" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <span data-repeater-delete type="button"
                                                                    class="remove-item-button">
                                                                    <i class="fa fa-times"></i>
                                                                </span>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <input data-repeater-create type="button" class="bg-add"
                                                        value="Add New" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @elseif ($Statics->alias === 'ask-list')
                        <div class="containerInput  twothirds">
                            <div class="-space-y-px mb-4">
                                <div class="containerInput ">
                                    <div class="widget-title">
                                        <h4>
                                            <span>Bổ xung</span>
                                        </h4>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pricelist" class="control-label">
                                            Bảng câu hỏi
                                        </label>
                                        <div class="repeater">
                                            <div data-repeater-list="pricelist">
                                                @foreach (json_decode($Statics->pricelist) as $key => $value)
                                                    <div data-repeater-item class="data-repeater-item">
                                                        <div class="form-group data-repeater-form flexb-c">
                                                            <div class="col-12">
                                                                <div class="me-3">
                                                                    <label for="f2c6be2ae579c0933ac1457f64a44c1b">Câu
                                                                        hỏi</label>
                                                                    <input class="form-control me-3" data-counter="40"
                                                                        id="f2c6be2ae579c0933ac1457f64a44c1b" name="ask"
                                                                        value="{{ $value->ask }}" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="me-3">
                                                                    <label for="f2c6be2ae579c0933ac1457f64a44c1b">Trả
                                                                        lời</label>
                                                                    <input class="form-control" data-counter="40"
                                                                        id="f2c6be2ae579c0933ac1457f64a44c1b" name="reply"
                                                                        value="{{ $value->reply }}" type="text">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <span data-repeater-delete type="button" class="remove-item-button">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <input data-repeater-create type="button" class="bg-add pt-3" value="Add New" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="todo">
                        <div class=" right-sidebar">
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
                                        <button type="submit" name="submit" value="apply" class="btn btn-success">
                                            <i class="fa fa-check-circle"></i> Lưu &amp; chỉnh sửa
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="right-sidebar">
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="status" class="m-0 control-label required" aria-required="true">Trạng
                                            thái</label></h4>
                                </div>
                                <div class="widget-body p-3">
                                    <div class="ui-select-wrapper form-group">
                                        <select class="form-control ui-select ui-select" id="status" name="status">
                                            @isset($Statics->status)
                                                @if ($Statics->status == 'published')
                                                    <option value="published" selected="selected">Published</option>
                                                    <option value="draft">Bản nháp</option>
                                                    <option value="pending">Đang chờ xử lý</option>
                                                @endif

                                                @if ($Statics->status == 'draft')
                                                    <option value="published">Published</option>
                                                    <option value="draft" selected="draft">Bản nháp</option>
                                                    <option value="pending">Đang chờ xử lý</option>
                                                @endif

                                                @if ($Statics->status == 'pending')
                                                    <option value="published">Published</option>
                                                    <option value="draft">Bản nháp</option>
                                                    <option value="pending" selected="pending">Đang chờ xử lý</option>
                                                @endif
                                            @endisset
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                </form>

            @endisset
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
        $('#data-image').filemanager('image', {
            prefix: route_prefix
        });
    </script>

    <script>
        $(".btn-trigger-show-seo-detail").click(function() {
            $('.seo-edit-section').toggleClass('hidden-active');
        });
    </script>

    <script src="{{ asset('js/add-new-form.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js" defer></script>
@endsection
