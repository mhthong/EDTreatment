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
                    <h1>Product</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Product</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>



            <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
            id="add-blog-post-form" method="POST" action="{{  route('cars.update', ['car' => $car->id ,'detail' =>$detail->id])}}"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="table-data">
                    <div class="order">

                        <div class=" containerInput  twothirds p-3">
                            @isset($car)
                            <label for="name mt-0">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" placeholder=""
                                value="{{ $car->name }}" required />

                            <label for="name mt-0">Thương hiệu</label>
                            <input type="text" name="brand" id="brand" placeholder=""  value="{{ $car->brand }}" required />

                            <label for="name mt-0">Kiểu máy</label>
                            <input type="text" name="model" id="model" placeholder=""  value="{{ $car->model }}" required />

                            <label for="name mt-0">Giá</label>
                            <input type="munber" name="price" id="price" placeholder="VND"  value="{{ $car->price }}" required />

                            <label for="name mt-0">Năm sản xuất</label>
                            <input type="number" name="year" id="year" placeholder="1900 -  2100"  value="{{ $car->year }}"  min="1900" max="2100" required />

                            <label for="name mt-0">Loại - Dòng xe</label>
                            <input type="text" name="type" id="type" placeholder=""  value="{{ $car->type }}" required />

                            @endisset


                            @isset($detail)

                            @php
                            $array = json_decode($detail->value,true);
                            @endphp



                            <label for="name">Mô tả</label>
                            <textarea cols="30" rows="3" type="text" name="description" id="description" placeholder="" required>  {{ $array['description'] }}</textarea>
                            <label for="option"> Thông số :</label>

                            <select name="option" id="option" required>
                                @if ($detail->key = "1")
                                 <option value="1" selected>Ô tô động cơ điện</option>
                                 <option value="2" >Ô tô động cơ xăng</option>
                                 <option value="3" >Xe máy điện</option>
                                 <option value="4">Option</option>
                                @elseif ($detail->key = "2")
                                <option value="2" selected>Ô tô động cơ xăng</option>
                                <option value="1" >Ô tô động cơ điện</option>
                                <option value="3" >Xe máy điện</option>
                                <option value="4">Option</option>
                                @elseif($detail->key = "3")
                                <option value="3" selected>Xe máy điện</option>
                                <option value="2" >Ô tô động cơ xăng</option>
                                <option value="1" >Ô tô động cơ điện</option>
                                <option value="4">Option</option>
                                @endif

                            </select>


                            <div id="form-option">

                                <label for="length">Dài:</label>
                                <input type="text" id="length" name="length" placeholder="4940" value="@isset($array['length']){{ $array['length'] }}@endisset" required><br>

                                <label for="width">Rộng:</label>
                                <input type="text" id="width" name="width" placeholder="1960" value="@isset($array['width']){{ $array['width'] }}@endisset" required><br>

                                <label for="height">Cao:</label>
                                <input type="text" id="height" name="height" placeholder="1773" value="@isset($array['height'] ){{ $array['height']  }}@endisset" required><br>

                    @if ($detail->key = "1")
                   <!-- Form for option 1 -->
                   <label for="mt-0">GIÁ XE KHÔNG GỒM PIN</label>
                   <input type="munber" name="price_without_battery" id="price_without_battery" placeholder="" required value=" @isset($array['price_without_battery']) {{ $array['price_without_battery'] }} @endisset " required />
                   <label for="mt-0">GIÁ XE GỒM PIN</label>
                   <input type="munber" name="price_with_battery" id="price_with_battery" placeholder="" required value="@isset($array['price_with_battery']){{ $array['price_with_battery'] }} @endisset" required />
                   <label for="">Công suất tối đa</label>
                   <input type="text" name="Maximum_capacity" id="Maximum_capacity" placeholder="" required value="@isset( $array['Maximum_capacity'] ) {{  $array['Maximum_capacity']  }}@endisset" required />
                   <label for="">Mô men xoắn cực đại</label>
                   <input type="text" name="Maximum_torque" id="Maximum_torque" placeholder="" required value="@isset($array['Maximum_torque']){{ $array['Maximum_torque'] }}@endisset" required />
                   <label for="">Số ghế ngồi</label>
                   <input type="munber" name="seats" id="seats" placeholder="" required value="@isset($array['seats']){{ $array['seats'] }} @endisset" required />
                   <label for="">Quãng đường di chuyển (chuẩn NEDC)</label>
                   <input type="munber" name="Travel_distance" id="Travel_distance" placeholder="" required value="@isset($array['Travel_distance']) {{ $array['Travel_distance'] }} @endisset" required />
                   <label for="">Dung lượng pin khả dụng</label>
                   <input type="text" name="pin" id="pin" placeholder="" required value="@isset( $array['pin'] ) {{  $array['pin']  }} @endisset" required />
                   <label for="">Loại la-zăng</label>
                   <input type="text" name="la-zang" id="la-zang" placeholder="" required value="@isset($array['la-zang'] ){{ $array['la-zang']  }} @endisset" required />
                   <label for="">Thời gian nạp pin nhanh nhất (10%-70%)</label>
                   <input type="munber" name="time-pin" id="time-pin" placeholder="" required value="@isset($array['time-pin']) {{ $array['time-pin'] }}@endisset" required />
                   <label for="">Túi khí</label>
                   <input type="munber" name="Air-bag" id="Air-bag" placeholder="" required value="@isset($array['Air-bag']){{ $array['Air-bag'] }}@endisset" required />

                   @elseif ($detail->key = "2")
                                <label for="length">Dài:</label>
                                <input type="text" id="length" name="length" placeholder="4940" required value="@isset( $array['length'] ){{  $array['length']  }}@endisset"><br>

                                <label for="width">Rộng:</label>
                                <input type="text" id="width" name="width" placeholder="1960" value="@isset($array['width'] ) {{ $array['width']  }} @endisset" required><br>

                                <label for="height">Cao:</label>
                                <input type="text" id="height" name="height" placeholder="1773" value="@isset( $array['height']){{  $array['height']  }}@endisset" required><br>
                                <label for="wheelbase">Chiều dài cơ sở:</label>
                                <input type="text" id="wheelbase" name="wheelbase" placeholder="2933" value=" @isset($array['wheelbase']){{ $array['wheelbase'] }}@endisset" required><br>

                                <label for="">Công suất tối đa</label>
                                <input type="text" name="Maximum_capacity" id="Maximum_capacity" placeholder="" required value="@isset( $array['Maximum_capacity'] ) {{  $array['Maximum_capacity']  }}@endisset"required />
                                <label for="">Mô men xoắn cực đại</label>
                                <input type="text" name="Maximum_torque" id="Maximum_torque" placeholder="" required value="@isset( $array['Maximum_torque']){{  $array['Maximum_torque'] }}@endisset" required />
                                <label for="">Số ghế ngồi</label>
                                <input type="munber" name="seats" id="seats" placeholder="phút" required value="@isset($array['seats'] ) {{ $array['seats']  }}@endisset" required />
                                <label for="ground-clearance">Khoảng sáng gầm:</label>
                                <input type="text" id="ground-clearance" name="ground-clearance" placeholder="195" value="@isset($array['ground-clearance'] ){{ $array['ground-clearance']  }}@endisset" required><br>

                                <label for="fuel-capacity">Dung tích nhiên liệu:</label>
                                <input type="text" id="fuel-capacity" name="fuel-capacity" placeholder="85" value="@isset($array['fuel-capacity']){{ $array['fuel-capacity'] }} @endisset" required><br>

                                <label for="combined-fuel-economy">Mức tiêu thụ nhiên liệu (kết hợp):</label>
                                <input type="text" id="combined-fuel-economy" name="combined-fuel-economy" placeholder="8.39" value="@isset($array['combined-fuel-economy'] ){{ $array['combined-fuel-economy']  }}@endisset" required><br>

                                <label for="city-fuel-economy">Mức tiêu thụ nhiên liệu (đô thị):</label>
                                <input type="text" id="city-fuel-economy" name="city-fuel-economy" placeholder="10.46" value="@isset($array['city-fuel-economy']){{ $array['city-fuel-economy'] }}@endisset" required><br>

                                <label for="highway-fuel-economy">Mức tiêu thụ nhiên liệu (ngoài đô thị):</label>
                                <input type="text" id="highway-fuel-economy" name="highway-fuel-economy" placeholder="7.18" value="@isset($array['highway-fuel-economy']){{ $array['highway-fuel-economy'] }}@endisset" required><br>

                                <label for="engine-size">Động cơ:</label>
                                <input type="text" id="engine-size" name="engine-size" placeholder="2.0L" value="@isset( $array['engine-size'] ){{  $array['engine-size']  }}@endisset" required><br>

                                <label for="transmission">Hộp số:</label>
                                <input type="text" id="transmission" name="transmission" value="@isset($array['transmission'] ){{ $array['transmission']  }}@endisset" required><br>

                                <label for="drive-type">Dẫn động:</label>
                                <input type="text" id="drive-type" name="drive-type" value="@isset($array['drive-type'] ){{ $array['drive-type']  }}@endisset" required><br>
                    @elseif($detail->key = "3")
                        <!-- Form for option 2 -->
                        <label for="charging-time">Thời gian sạc:</label>
                        <input type="text" id="charging-time" name="charging-time" placeholder="6 giờ" value="@isset($array['charging-time'] ){{ $array['charging-time']  }}@endisset"  required><br>

                        <label for="engine-position">Động cơ đặt giữa:</label>
                        <input type="text" id="engine-position" name="engine-position" placeholder="Inhub" value="@isset($array['engine-position'] ){{ $array['engine-position']  }}@endisset"  required><br>

                        <label for="rated-power">Công suất danh định:</label>
                        <input type="text" id="rated-power" name="rated-power" placeholder="1800 W" value="@isset($array['rated-power'] ){{ $array['rated-power']  }}@endisset"  required><br>

                        <label for="suspension">Giảm xóc:</label>
                        <input type="text" id="suspension" name="suspension" placeholder="Ống lồng - giảm chấn thủy lực; giảm xóc đôi, giảm chấn thủy lực" value="@isset($array['suspension'] ){{ $array['suspension']  }}@endisset"  required><br>

                        <label for="battery">PIN:</label>
                        <input type="text" id="battery" name="battery" placeholder="01 Pin LFP" value="@isset( $array['battery'] ){{  $array['battery']  }}@endisset"  required><br>

                        <label for="battery-capacity">Dung lượng PIN:</label>
                        <input type="text" id="battery-capacity" name="battery-capacity" placeholder="3.5 kWh" value="@isset($array['battery-capacity']){{ $array['battery-capacity'] }}
                        @endisset"  required><br>

                        <label for="max-speed">Tốc độ tối đa:</label>
                        <input type="text" id="max-speed" name="max-speed" placeholder="78 km/h" value="@isset($array['max-speed']){{ $array['max-speed'] }}
                        @endisset"  required><br>

                        <label for="wheelbase-distance">Khoảng cách trục bánh trước - sau:</label>
                        <input type="text" id="wheelbase-distance" name="wheelbase-distance" placeholder="1320 mm" value="@isset($array['wheelbase-distance']){{ $array['wheelbase-distance'] }}
                        @endisset"  required><br>

                        <label for="weight">Trọng lượng:</label>
                        <input type="text" id="weight" name="weight" placeholder="110 kg bao gồm pin LFP" value="@isset($array['weight']){{ $array['weight'] }}@endisset"  required><br>

                        <label for="ground-clearance">Khoảng sáng gầm xe:</label>
                        <input type="text" id="ground-clearance" name="ground-clearance" placeholder="135 mm" value="@isset($array['ground-clearance']){{ $array['ground-clearance'] }}@endisset"  required><br>

                        <label for="brakes">Phanh trước và sau:</label>
                        <input type="text" id="brakes" name="brakes" placeholder="Phanh đĩa/ cơ" value="@isset($array['brakes'] ){{ $array['brakes']  }}@endisset"  required><br>
                    @endif
                            </div>

                            <div class=" containerInput  twothirds p-3 mt-3">
                                <div class="-space-y-px mb-4">
                                    <div class="containerInput ">
                                        <div class="widget-title">
                                            <h4>
                                                <span>Màu sắc</span>
                                            </h4>
                                        </div>
                                        <div class="form-group ">
                                            <label for="colorlist" class="control-label">
                                                Bảng màu sắc
                                            </label>
                                            @php
                                            $color = json_decode($detail->color,true);
                                            @endphp
                                            @php
                                            $i = 0;
                                            @endphp
                                            <div class="repeater">
                                                <div data-repeater-list="colorlist">
                                                    @foreach ($color as $key => $value)



                                                    <div data-repeater-item class="data-repeater-item">
                                                            <div class="form-group data-repeater-form">
                                                                <label for="f2c6be2ae579c0933ac1457f64a44c1b">Tên màu</label>
                                                                <input class="form-control me-3" data-counter="40"
                                                                id="f2c6be2ae579c0933ac1457f64a44c1b"

                                                                name="color_name" type="text" value="{{ $value['color_name'][0] }}" multiple>

                                                                <div class="color-avatar">
                                                                    <label for="f2c6be2ae579c0933ac1457f64a44c1b">Hình ảnh màu đại diện</label>
                                                                    <div class="holder image-category" id="anchor-data-preview" value=""></div>
                                                                    <span class="input-group-btn">
                                                                    <a class="text-primary link_a" id="anchor{{ $key }}" data-input="anchor-data-input" data-preview="anchor-data-preview">
                                                                        Chọn ảnh
                                                                    </a>
                                                                    </span>
                                                                    <p class="p p-1 bg-span">48*48 px - Kích thước.</p>
                                                                    <input class="form-control data-image-input" id="anchor-data-input" style="display: none"  value="{{ $value['image'][0]}}"  type="text" name="image" multiple>
                                                                </div>


                                                                <div class="color-product">

                                                                    <label for="f2c6be2ae579c0933ac1457f64a44c1b">Hình ảnh sản phẩm đại diện</label>
                                                                    <div class="holder image-category-car-0" id="anchor-data-preview-avatar" value="">
                                                                    <!-- Thêm ảnh đã upload vào đây -->
                                                                    </div>
                                                                    <span class="input-group-btn">
                                                                    <a class="text-primary link_a" id="anchor-avatar{{ $key }}" data-input="anchor-data-input-avatar" data-preview="anchor-data-preview-avatar">
                                                                        Chọn ảnh
                                                                    </a>
                                                                    </span>
                                                                    <p class="p p-1 bg-span">700*350 px - Kích thước.</p>

                                                                    <input class="form-control data-image-input" id="anchor-data-input-avatar" style="display: none" type="text" name="image_car" value="{{ $value['image_car'][0]}}" multiple>

                                                                </div>
                                                            </div>

                                                            <span data-repeater-delete type="button"
                                                            class="remove-item-button">
                                                            <i class="fa fa-times"></i>
                                                            </span>
                                                    </div>
                                                    @php
                                                        $i++;
                                                    @endphp

                                                 @endforeach

                                                </div>
                                                <input data-repeater-create type="button" class="bg-add pt-3"   value="Add New" >


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endisset

                    <div class="todo">
                        <div class="right-sidebar">
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
                                            @isset($array['status'] )
                                            @if ($array['status']  == 'published')
                                                <option value="published" selected="selected">Published</option>
                                                <option value="draft">Bản nháp</option>
                                                <option value="pending">Đang chờ xử lý</option>
                                            @endif

                                            @if ($array['status'] == 'draft')
                                                <option value="published">Published</option>
                                                <option value="draft" selected="draft">Bản nháp</option>
                                                <option value="pending">Đang chờ xử lý</option>
                                            @endif

                                            @if ($array['status']  == 'pending')
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


                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="image" class="control-label required m-0"
                                            aria-required="true">Nội thất</label></h4>
                                </div>
                                <div class="widget-body">

                                    <div class="form-group ">

                                        <textarea class="form-control" cols="2" rows="2" name="noithat" id="editor1" placeholder="Nội dung" value="">@isset($array['noithat'] ){{ $array['noithat']  }}@endisset</textarea>

                                        <div class="holder image-category" id="image-category" value="">
                                        </div>
                                        <div class="-space-y-px mb-4">
                                            <div class="containerInput input-group">
                                                <span class="input-group-btn ">
                                                    <a class="text-primary" id="image_manager" data-input="image"
                                                        data-preview="image-category">
                                                        Chọn ảnh
                                                    </a>
                                                </span>

                                                <input class="form-control" class="form-control" id="image" style="display: none"
                                                    type="text" name="image" >
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="image" class="control-label required m-0"
                                            aria-required="true">Ngoại thất</label></h4>
                                </div>
                                <div class="widget-body">

                                    <div class="form-group ">

                                        <textarea class="form-control" cols="2" rows="2" name="ngoaithat" id="editor2" placeholder="Nội dung" value="">@isset($array['ngoaithat'] ){{ $array['ngoaithat']  }}@endisset</textarea>

                                        <div class="holder image-category" id="image-category1" value="">
                                        </div>
                                        <div class="-space-y-px mb-4">
                                            <div class="containerInput input-group">
                                                <span class="input-group-btn ">
                                                    <a class="text-primary" id="image_manager1" data-input="image1"
                                                        data-preview="image-category1">
                                                        Chọn ảnh
                                                    </a>
                                                </span>

                                                <input class="form-control" class="form-control" id="image1" style="display: none"
                                                    type="text" name="ngoaithatimg" >
                                            </div>

                                        </div>
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
            CKEDITOR.replace('editor2', options);
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
            $('#image_manager1').filemanager('image', {
                prefix: route_prefix
            });
            $('#data-image').filemanager('image', {prefix: route_prefix});
            $('#anchor').filemanager('image', {
                prefix: route_prefix
            });
            $('#anchor-avatar').filemanager('image', {
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

    <script>
        const option = document.getElementById('option');
        const option_form = document.getElementById('form-option');

        option.addEventListener('change', () => {
        if (option.value === '1') {
            option_form.innerHTML = `
            <!-- Form for option 1 -->
                   <label for="mt-0">GIÁ XE KHÔNG GỒM PIN</label>
                   <input type="munber" name="price_without_battery" id="price_without_battery" placeholder="" required value=" @isset($array['price_without_battery']) {{ $array['price_without_battery'] }} @endisset " required />
                   <label for="mt-0">GIÁ XE GỒM PIN</label>
                   <input type="munber" name="price_with_battery" id="price_with_battery" placeholder="" required value="@isset($array['price_with_battery'])
                       {{ $array['price_with_battery'] }}
                   @endisset" required />

                   <label for="length">Dài:</label>
                   <input type="text" id="length" name="length" placeholder="4940" value="@isset($array['length'])
                       {{ $array['length'] }}
                   @endisset" required><br>

                   <label for="width">Rộng:</label>
                   <input type="text" id="width" name="width" placeholder="1960" value="@isset($array['width'])
                       {{ $array['width'] }}
                   @endisset" required><br>

                   <label for="height">Cao:</label>
                   <input type="text" id="height" name="height" placeholder="1773" value="@isset($array['height'] )
                       {{ $array['height']  }}
                   @endisset" required><br>
                   <label for="">Công suất tối đa</label>
                   <input type="text" name="Maximum_capacity" id="Maximum_capacity" placeholder="" required value="@isset( $array['Maximum_capacity'] )
                       {{  $array['Maximum_capacity']  }}
                   @endisset" required />
                   <label for="">Mô men xoắn cực đại</label>
                   <input type="text" name="Maximum_torque" id="Maximum_torque" placeholder="" required value="@isset($array['Maximum_torque'])
                       {{ $array['Maximum_torque'] }}
                   @endisset" required />
                   <label for="">Số ghế ngồi</label>
                   <input type="munber" name="seats" id="seats" placeholder="" required value="@isset($array['seats'])
                       {{ $array['seats'] }}
                   @endisset" required />


                   <label for="">Quãng đường di chuyển (chuẩn NEDC)</label>
                   <input type="munber" name="Travel_distance" id="Travel_distance" placeholder="" required value="@isset($array['Travel_distance'])
                       {{ $array['Travel_distance'] }}
                   @endisset" required />
                   <label for="">Dung lượng pin khả dụng</label>
                   <input type="text" name="pin" id="pin" placeholder="" required value="@isset( $array['pin'] )
                       {{  $array['pin']  }}
                   @endisset" required />
                   <label for="">Loại la-zăng</label>
                   <input type="text" name="la-zang" id="la-zang" placeholder="" required value="@isset($array['la-zang'] )
                       {{ $array['la-zang']  }}
                   @endisset" required />
                   <label for="">Thời gian nạp pin nhanh nhất (10%-70%)</label>
                   <input type="munber" name="time-pin" id="time-pin" placeholder="" required value="@isset($array['time-pin'])
                       {{ $array['time-pin'] }}
                   @endisset" required />
                   <label for="">Túi khí</label>
                   <input type="munber" name="Air-bag" id="Air-bag" placeholder="" required value="@isset($array['Air-bag'])
                       {{ $array['Air-bag'] }}
                   @endisset" required />
    `;
        } else if (option.value === '2') {
            option_form.innerHTML = `
            <label for="length">Dài:</label>
                                <input type="text" id="length" name="length" placeholder="4940" required value="@isset( $array['length'] )
                                    {{  $array['length']  }}
                                @endisset"><br>

                                <label for="width">Rộng:</label>
                                <input type="text" id="width" name="width" placeholder="1960" value="@isset($array['width'] )
                                    {{ $array['width']  }}
                                @endisset" required><br>

                                <label for="height">Cao:</label>
                                <input type="text" id="height" name="height" placeholder="1773" value="@isset( $array['height'])
                                {{  $array['height']  }}
                                @endisset" required><br>
                                <label for="wheelbase">Chiều dài cơ sở:</label>
                                <input type="text" id="wheelbase" name="wheelbase" placeholder="2933" value=" @isset($array['wheelbase'])
                                    {{ $array['wheelbase'] }}
                                @endisset" required><br>

                                <label for="">Công suất tối đa</label>
                                <input type="text" name="Maximum_capacity" id="Maximum_capacity" placeholder="" required value="@isset( $array['Maximum_capacity'] )
                                    {{  $array['Maximum_capacity']  }}
                                @endisset"required />
                                <label for="">Mô men xoắn cực đại</label>
                                <input type="text" name="Maximum_torque" id="Maximum_torque" placeholder="" required value="@isset( $array['Maximum_torque'])
                                    {{  $array['Maximum_torque'] }}
                                @endisset" required />
                                <label for="">Số ghế ngồi</label>
                                <input type="munber" name="seats" id="seats" placeholder="phút" required value="@isset($array['seats'] )
                                    {{ $array['seats']  }}
                                @endisset" required />
                                <label for="ground-clearance">Khoảng sáng gầm:</label>
                                <input type="text" id="ground-clearance" name="ground-clearance" placeholder="195" value="@isset($array['ground-clearance'] )
                                    {{ $array['ground-clearance']  }}
                                @endisset" required><br>

                                <label for="fuel-capacity">Dung tích nhiên liệu:</label>
                                <input type="text" id="fuel-capacity" name="fuel-capacity" placeholder="85" value="@isset($array['fuel-capacity'])
                                    {{ $array['fuel-capacity'] }}
                                @endisset" required><br>

                                <label for="combined-fuel-economy">Mức tiêu thụ nhiên liệu (kết hợp):</label>
                                <input type="text" id="combined-fuel-economy" name="combined-fuel-economy" placeholder="8.39" value="@isset($array['combined-fuel-economy'] )
                                    {{ $array['combined-fuel-economy']  }}
                                @endisset" required><br>

                                <label for="city-fuel-economy">Mức tiêu thụ nhiên liệu (đô thị):</label>
                                <input type="text" id="city-fuel-economy" name="city-fuel-economy" placeholder="10.46" value="@isset($array['city-fuel-economy'])
                                    {{ $array['city-fuel-economy'] }}
                                @endisset" required><br>

                                <label for="highway-fuel-economy">Mức tiêu thụ nhiên liệu (ngoài đô thị):</label>
                                <input type="text" id="highway-fuel-economy" name="highway-fuel-economy" placeholder="7.18" value="@isset($array['highway-fuel-economy'])
                                    {{ $array['highway-fuel-economy'] }}
                                @endisset" required><br>

                                <label for="engine-size">Động cơ:</label>
                                <input type="text" id="engine-size" name="engine-size" placeholder="2.0L" value="@isset( $array['engine-size'] )
                                    {{  $array['engine-size']  }}
                                @endisset" required><br>

                                <label for="transmission">Hộp số:</label>
                                <input type="text" id="transmission" name="transmission" value="@isset($array['transmission'] )
                                    {{ $array['transmission']  }}
                                @endisset" required><br>

                                <label for="drive-type">Dẫn động:</label>
                                <input type="text" id="drive-type" name="drive-type" value="@isset($array['drive-type'] )
                                    {{ $array['drive-type']  }}
                                @endisset" required><br>
    `;
        }else if (option.value === '3') {
            option_form.innerHTML = `
            <!-- Form for option 2 -->
            <!-- Form for option 2 -->
                        <label for="charging-time">Thời gian sạc:</label>
                        <input type="text" id="charging-time" name="charging-time" placeholder="6 giờ" value="@isset($array['charging-time'] )
                            {{ $array['charging-time']  }}
                        @endisset"  required><br>

                        <label for="engine-position">Động cơ đặt giữa:</label>
                        <input type="text" id="engine-position" name="engine-position" placeholder="Inhub" value="@isset($array['engine-position'] )
                            {{ $array['engine-position']  }}
                        @endisset"  required><br>

                        <label for="rated-power">Công suất danh định:</label>
                        <input type="text" id="rated-power" name="rated-power" placeholder="1800 W" value="@isset($array['rated-power'] )
                            {{ $array['rated-power']  }}
                        @endisset"  required><br>

                        <label for="suspension">Giảm xóc:</label>
                        <input type="text" id="suspension" name="suspension" placeholder="Ống lồng - giảm chấn thủy lực; giảm xóc đôi, giảm chấn thủy lực" value="@isset($array['suspension'] )
                            {{ $array['suspension']  }}
                        @endisset"  required><br>

                        <label for="battery">PIN:</label>
                        <input type="text" id="battery" name="battery" placeholder="01 Pin LFP" value="@isset( $array['battery'] )
                            {{  $array['battery']  }}
                        @endisset"  required><br>

                        <label for="battery-capacity">Dung lượng PIN:</label>
                        <input type="text" id="battery-capacity" name="battery-capacity" placeholder="3.5 kWh" value="@isset($array['battery-capacity'])
                            {{ $array['battery-capacity'] }}
                        @endisset"  required><br>

                        <label for="max-speed">Tốc độ tối đa:</label>
                        <input type="text" id="max-speed" name="max-speed" placeholder="78 km/h" value="@isset($array['max-speed'])
                            {{ $array['max-speed'] }}
                        @endisset"  required><br>

                        <label for="wheelbase-distance">Khoảng cách trục bánh trước - sau:</label>
                        <input type="text" id="wheelbase-distance" name="wheelbase-distance" placeholder="1320 mm" value="@isset($array['wheelbase-distance'])
                            {{ $array['wheelbase-distance'] }}
                        @endisset"  required><br>

                        <label for="weight">Trọng lượng:</label>
                        <input type="text" id="weight" name="weight" placeholder="110 kg bao gồm pin LFP" value="@isset($array['weight'])
                            {{ $array['weight'] }}
                        @endisset"  required><br>

                        <label for="ground-clearance">Khoảng sáng gầm xe:</label>
                        <input type="text" id="ground-clearance" name="ground-clearance" placeholder="135 mm" value="@isset($array['ground-clearance'])
                            {{ $array['ground-clearance'] }}
                        @endisset"  required><br>

                        <label for="brakes">Phanh trước và sau:</label>
                        <input type="text" id="brakes" name="brakes" placeholder="Phanh đĩa/ cơ" value="@isset($array['brakes'] )
                            {{ $array['brakes']  }}
                        @endisset"  required><br>
    `;
        }else if (option.value === '4') {
            option_form.innerHTML = ``}
        });
    </script>
@endsection
