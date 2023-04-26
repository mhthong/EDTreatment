
@extends('admin.app')
@section('head')
<script>
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea#editor',
        relative_urls: false,
        directionality: 'rtl',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | rtl ltr",
        file_picker_callback: function (callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endsection
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
            @isset($Blocks )


            <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
            id="add-blog-post-form" method="post" action="{{ route('blocks.update', ['id'=>$Blocks->id]) }}" enctype="multipart/form-data">
            @csrf

                        <div class="table-data">
                            <div class="order">
                                <div class=" containerInput  twothirds">
                                    <div class="form-group">

                                        <label for="name" class="control-label required" aria-required="true">Tên trang tĩnh</label>
                                        <input class="form-control is-valid" placeholder="Tên trang" data-counter="120"
                                            readonly="" name="name" type="text" value="{{$Blocks->name}}"
                                            id="name" aria-invalid="false" aria-describedby="alias-error">
                                    </div>

                                    <label for="name">Mô tả</label>
                                    <textarea cols="30" rows="3" type="text" name="description" id="description" placeholder="" required>{{$Blocks->description}}</textarea>
                                    <label for="is_featured">Nổi bật</label>
                                    @if ($Blocks->target == 1)
                                    <label class="switch">
                                        <input type="hidden" name="is_featured" value="0">
                                        <input type="checkbox" name="is_featured" class="onoffswitch-checkbox"
                                            id="is_featured" value="1" checked>
                                        <span class="slider"></span>
                                    </label>
                                    @else
                                    <label class="switch">
                                        <input type="hidden" name="is_featured" value="0" checked>
                                        <input type="checkbox" name="is_featured" class="onoffswitch-checkbox"
                                            id="is_featured" value="1">
                                        <span class="slider"></span>
                                    </label>
                                    @endif
                                    <label for="name">Nội dung</label>
                                    <textarea cols="2" rows="2" name="content" id="editor1" placeholder="Nội dung" required value="">{{$Blocks->content}}</textarea>

                                </div>
                                <div class="  containerInput twothirds mt-3">
                                    <div class="widget-body">
                                        <div class="flexb-c" style="justify-content: space-between">
                                            <h4><span>Tối ưu hoá bộ máy tìm kiếm (SEO)</span></h4>
                                            <a href="#1" class="btn-trigger-show-seo-detail text-primary">Chỉnh sửa
                                                SEO</a>
                                        </div>

                                        <div id="1" class="seo-preview">
                                            <p class="default-seo-description ">Thiết lập các thẻ mô tả giúp người dùng dễ
                                                dàng tìm thấy trên công cụ tìm kiếm như Google.</p>
                                            <div class="existed-seo-meta  hidden ">
                                                <span class="page-title-seo">

                                                </span>

                                                <div class="page-url-seo ws-nm">
                                                    <p>{{ env('APP_URL') }}</p>
                                                </div>

                                                <div class="ws-nm">
                                                    <span style="color: #70757a;"></span>
                                                    <span class="page-description-seo">

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @isset($MetaBoxes)

                                            @foreach ($MetaBoxes as $key => $value)

                                                    @isset($value->meta_value)
                                                        <div class="seo-edit-section hidden">
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="seo_title" class="control-label">Tiêu đề trang</label>
                                                                <input class="form-control" id="seo_title"
                                                                    placeholder="Tiêu đề trang" data-counter="120"
                                                                    name="seo_meta[seo_title]" type="text"
                                                                    value="  {{ print_r(json_decode($value->meta_value, true)['seo_title'], true) }}">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="seo_description" class="control-label">Mô tả trang</label>
                                                                <textarea class="form-control" rows="3" id="seo_description" placeholder="Mô tả trang" data-counter="160"
                                                                    name="seo_meta[seo_description]" cols="50">  {{ print_r(json_decode($value->meta_value, true)['seo_description'], true) }}</textarea>
                                                            </div>
                                                        </div>
                                                    @endisset

                                            @endforeach
                                        @endisset

                                    </div>
                                </div>
                            </div>
                            <div class="todo" >
                                <div class="right-sidebar">

                                    <div class="widget meta-boxes form-actions form-actions-default action-horizontal ">
                                        <div class="widget-title">
                                            <h4>
                                                <span>Xuất bản</span>
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="btn-set">
                                                <button type="submit" name="submit" value="save" class="btn btn-info pt-1">
                                                    <i class="fa fa-save"></i> Lưu
                                                </button>

                                                &nbsp;
                                                <button type="submit" name="submit" value="apply"
                                                    class="btn btn-success pt-1">
                                                    <i class="fa fa-check-circle"></i> Lưu &amp; chỉnh sửa
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-sidebar mt-3">
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
                                                    @isset($Blocks->status)
                                                    @if ($Blocks->status == 'published')
                                                        <option value="published" selected="selected">Published</option>
                                                        <option value="draft">Bản nháp</option>
                                                        <option value="pending">Đang chờ xử lý</option>
                                                    @endif

                                                    @if ($Blocks->status == 'draft')
                                                        <option value="published">Published</option>
                                                        <option value="draft" selected="draft">Bản nháp</option>
                                                        <option value="pending">Đang chờ xử lý</option>
                                                    @endif

                                                    @if ($Blocks->status == 'pending')
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
                            </div>
                        </div>

                    </form>
                    @endisset

        </main>
    </section>
@endsection



@section('footer')
<script>
    var route_prefix = "/admin/laravel-filemanager";
    $('#data-image').filemanager('image', {prefix: route_prefix});
</script>
@endsection

@section('script')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
{{--     @include('layouts.ckeditor'); --}}
    <script>
        var options = {
          filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
/*           filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form' */
        };
      </script>
    <script>
        CKEDITOR.replace('editor1', options);
    </script>
            <script>
                $(".btn-trigger-show-seo-detail").click(function() {
                    $('.seo-edit-section').toggleClass('hidden-active');
                });
            </script>
{{--     @include('ckfinder::setup'); --}}
@endsection

