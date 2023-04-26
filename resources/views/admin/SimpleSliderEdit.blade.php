@extends('admin.app')
@section('head')
    <style>
        .carousel__button {
            display: none !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
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
        <!-- MAIN -->
        <main>
            @include('admin.Notifications')
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Posts</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>




            <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
                id="add-blog-post-form" method="post"
                action="{{ route('update-simple-slider', ['id' => $data_slider->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="table-data">
                    <div class="order">
                        <div class="containerInput  twothirds p-3">
                            <label for="name mt-0">Name</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="" required
                                value="@isset($data_slider->name){{ $data_slider->name }}@endisset" required />
                            <label for="name">Key</label>
                            <input class="form-control" type="text" style="background: #989898;" name="key"
                                id="key" placeholder="" required
                                value="@isset($data_slider->key){{ $data_slider->key }}@endisset" readonly />

                            <label for="name">Mô tả</label>
                            <textarea class="form-control" cols="2" rows="2" name="description" id="description"
                                placeholder="Mô tả ngắn" required value=""> @isset($data_slider->description)
{{ $data_slider->description }}
@endisset
</textarea>
                        </div>



                    </div>

                    <div class="table-data">
                        <div class="order">

                            <table>

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình Ảnh
                                        </th>
                                        <th>Tiêu Đề</th>
                                        <th>Thứ Tự</th>
                                        <th>Operations
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dialog Contents -->
                                    <div id="dialog-content" style="display:none;max-width:500px;">

                                        <form method="POST"
                                            action="{{ route('created-simple-slider-item', ['id_simple' => $data_slider->id]) }}"
                                            accept-charset="UTF-8" id="botble-simple-slider-forms-simple-slider-item-form"
                                            novalidate="novalidate">
                                            @csrf

                                            <div class="modal-title">
                                                <i class="til_img"></i> <strong>
                                                    Add Slider
                                                </strong>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-body">
                                                    <label for="title" class="control-label">Tiêu
                                                        đề</label>
                                                    <input class="form-control" data-counter="120" name="title"
                                                        type="text" value="#" id="title">
                                                </div>
                                                <label for="link" class="control-label">Liên
                                                    kết</label>
                                                <input class="form-control" placeholder="http://" data-counter="120"
                                                    name="link" type="text" value="" id="link">
                                            </div>

                                            <label for="description" class="control-label">Mô tả</label>
                                            <textarea class="form-control" rows="4" placeholder="Mô tả ngắn" data-counter="2000" name="description"
                                                cols="50" id="description"></textarea>
                                            <div class="form-group">
                                                <label for="order" class="control-label">Thứ tự</label>
                                                <input class="form-control" placeholder="Sắp xếp" name="order"
                                                    type="number" value="" id="order">
                                            </div>
                                            <div class="form-group ">
                                                <p class="p-2 col-12">Hình ảnh</p>
                                                <div class="holder holder1" id="data-preview-image" value="">
                                                </div>
                                                <div class="-space-y-px mb-4">
                                                    <div class="containerInput input-group">
                                                        <span class="input-group-btn ">
                                                            <a class="text-primary data-image" id=""
                                                                data-input="data-add-image"
                                                                data-preview="data-preview-image">
                                                                Chọn ảnh
                                                            </a>
                                                        </span>
                                                        <p class="p p-1 col-12 bg-span">Kích thước - W:1920*770px</p>
                                                        <input class="form-control" id="data-add-image"
                                                            style="display: none" type="text" name="image" required>

                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary text-black bg-span">
                                                Lưu thay đổi
                                            </button>
                                    </div>


                                    <!-- Dialog Trigger -->
                                    <button data-fancybox="dialog" class="btn btn-primary mb-3"
                                        data-src="#dialog-content">
                                        <i class="fa-solid fa-pen-to-square"></i><span class="ps-1">Add new</span>
                                    </button>

                                    @foreach ($SimpleSliderItem as $row)
                                        <tr>
                                            <td>
                                                @isset($row->id)
                                                    {{ $row->id }}
                                                @endisset
                                            </td>
                                            <td>
                                                <img src="@isset($row->image)
                                                        {{ $row->image }}
                                                    @endisset"
                                                    alt="@isset($row->image)
                                                    {{ $row->image }}
                                                @endisset"
                                                    srcset="" width="50px" height="50px">

                                            </td>
                                            <td>
                                                @isset($row->title)
                                                    {{ $row->title }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($row->order)
                                                    {{ $row->order }}
                                                @endisset

                                            </td>

                                            <td>

                                                <!-- Dialog Contents -->
                                                <div id="dialog-content.{{ $row->id }}"
                                                    style="display:none;max-width:500px;">

                                                    <form method="POST"
                                                        action="{{ route('update-simple-slider-item', ['id' => $row->id]) }}"
                                                        accept-charset="UTF-8"
                                                        id="botble-simple-slider-forms-simple-slider-item-form"
                                                        novalidate="novalidate">
                                                        @csrf

                                                        <div class="modal-title">
                                                            <i class="til_img"></i> <strong>
                                                                Edit Slider
                                                                @isset($row->id)
                                                                    {{ $row->id }}
                                                                @endisset
                                                            </strong>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <label for="title" class="control-label">Tiêu
                                                                    đề</label>
                                                                <input class="form-control" data-counter="120"
                                                                    name="title" type="text" value="#"
                                                                    id="title">
                                                            </div>
                                                            <label for="link" class="control-label">Liên
                                                                kết</label>
                                                            <input class="form-control" placeholder="http://"
                                                                data-counter="120" name="link" type="text"
                                                                value="#" id="link">
                                                        </div>

                                                        <label for="description" class="control-label">Mô tả</label>
                                                        <textarea class="form-control" rows="4" placeholder="Mô tả ngắn" data-counter="2000" name="description"
                                                            cols="50" id="description"></textarea>
                                                        <div class="form-group">
                                                            <label for="order" class="control-label">Thứ tự</label>
                                                            <input class="form-control" placeholder="Sắp xếp"
                                                                name="order" type="number" value="1"
                                                                id="order">
                                                        </div>
                                                        <div class="form-group ">
                                                            <img src="" alt="" sizes=""
                                                                style="width: 200px;" srcset="">
                                                            <p class="p-2 col-12">Hình ảnh</p>
                                                            <div class="-space-y-px mb-4">
                                                                <div class="containerInput input-group">
                                                                    <span class="input-group-btn ">
                                                                        <a class="text-primary data-image" id=""
                                                                            data-input="@isset($row->id){{ $row->id }}@endisset"
                                                                            data-preview="@isset($row->id){{ 'holder' . $row->id }}@endisset">
                                                                            Chọn ảnh
                                                                        </a>
                                                                    </span>
                                                                    <p class="p p-1 col-12 bg-span">Kích thước -
                                                                        W:1920*770px</p>
                                                                    <input class="form-control"
                                                                        id="@isset($row->id){{ $row->id }}@endisset"
                                                                        style="display: none" type="text"
                                                                        name="image" required>
                                                                    <p class="p-2 col-12">Hình ảnh Cập Nhật</p>
                                                                    <div class="holder holder1"
                                                                        id="@isset($row->id){{ 'holder' . $row->id }}@endisset"
                                                                        value=""></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary text-black bg-span">
                                                            Lưu thay đổi
                                                        </button>
                                                </div>




                        </div>
            </form>
            </div>

            <!-- Dialog Trigger -->
            <button data-fancybox="dialog" class="btn btn-primary m-1" data-src="#dialog-content.{{ $row->id }}">
                <i class="fa-solid fa-pen-to-square"></i><span class="ps-1 m-1">Sữa</span>
            </button>

            <form method="POST" action="{{ route('simple-slider-item.delete', ['id' => $row->id]) }}"
                onsubmit="return ConfirmDelete( this )">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger m-1" type="submit"><i class="fa-solid fa-trash"></i>
                    <span class="ps-1 m-1">Xóa</span></button>
            </form>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>


            </div>
            </div>
            <div class="todo">
                <div class="right-sidebar ">
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
                <div class="right-sidebar mt-3">
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4><label for="status" class="m-0 control-label required" aria-required="true">Trạng
                                    thái</label></h4>
                        </div>
                        <div class="widget-body p-3">
                            <div class="ui-select-wrapper form-group">
                                <select class="form-control ui-select ui-select" id="status" name="status">

                                    <option value="published" selected="selected">Published</option>
                                    <option value="draft">Bản nháp</option>
                                    <option value="pending">Đang chờ xử lý</option>

                                </select>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
            </form>



        </main>
    @endsection

    @section('footer')
        <script>
            var route_prefix = "/admin/laravel-filemanager";
            $('#lfm').filemanager('image', {
                prefix: route_prefix
            });
            $('.data-image').filemanager('image', {
                prefix: route_prefix
            });
            $('#add-image').filemanager('image', {
                prefix: route_prefix
            });
        </script>
    @endsection

    @section('script')


        <script>
            // Show HTML element
            Fancybox.show([{
                src: "#dialog-content",
                type: "inline",
                infinite: false,
            }]);

            // Show a copy of the element
            Fancybox.show([{
                src: "#dialog-content",
                type: "clone"
                infinite: false,
            }]);
        </script>
        {{--     @include('ckfinder::setup'); --}}
    @endsection
