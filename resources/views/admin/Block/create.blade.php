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
                        id="add-blog-post-form" method="post" action="{{ route('block-store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="table-data">
                            <div class="order">
                                <div class="containerInput  twothirds p-3">
                                    <label for="name" class="mt-0" >Name</label>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="" required
                                        value="" required />
                                    <label for="name" >Mô tả</label>
                                    <textarea cols="30" rows="3" type="text" name="description" id="description" placeholder="" required></textarea>
                                    <label for="is_featured">Nổi bật</label>
                                    <label class="switch">
                                        <input class="form-control" type="hidden" name="is_featured" value="0">
                                        <input class="form-control" type="checkbox" name="is_featured" class="onoffswitch-checkbox"
                                            id="is_featured" value="1">
                                        <span class="slider"></span>
                                    </label>

                                    <label for="name">Nội dung</label>
                                    <textarea class="form-control" cols="2" rows="2" name="content" id="editor1" placeholder="Nội dung" required value=""></textarea>
                                </div>
                                <div class=" containerInput twothirds p-3">
                                    <div class="widget-body">
                                        <div class="flexb-c" style="justify-content: space-between">
                                            <h5><span>Tối ưu hoá bộ máy tìm kiếm (SEO)</span></h5>
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
                            <div class="todo" style="    max-height: 320px;">
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
                                                    <option value="published" selected="selected">Published</option>
                                                    <option value="draft">Bản nháp</option>
                                                    <option value="pending">Đang chờ xử lý</option>
                                                </select>

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
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
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
        $('#data-image').filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script>
        $(".btn-trigger-show-seo-detail").click(function() {
            $('.seo-edit-section').toggleClass('hidden-active');
        });
    </script>
@endsection
