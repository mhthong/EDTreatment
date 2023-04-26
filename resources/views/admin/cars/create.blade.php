
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
							<a class="active" href="#">Product</a>
						</li>
					</ul>
				</div>

			</div>

            <form class="p-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" name="add-blog-post-form"
            id="add-blog-post-form" method="post" action="{{ route('cars.store') }}"
            enctype="multipart/form-data">
                @csrf
                <div class="table-data">
                    <div class="order">
                        <div class=" containerInput  twothirds p-3">
                            <label for="name mt-0">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" placeholder=""
                                value="" required />

                            <label for="name mt-0">Thương hiệu</label>
                            <input type="text" name="brand" id="brand" placeholder=""  value="" required />

                            <label for="name mt-0">Kiểu máy</label>
                            <input type="text" name="model" id="model" placeholder=""  value="" required />

                            <label for="name mt-0">Giá</label>
                            <input type="munber" name="price" id="price" placeholder="VND"  value="" required />

                            <label for="name mt-0">Năm sản xuất</label>
                            <input type="number" name="year" id="year" placeholder="1900 -  2100"  value=""  min="1900" max="2100" required />

                            <label for="name mt-0">Loại - Dòng xe</label>
                            <input type="text" name="type" id="type" placeholder=""  value="" required />

                            <label for="name">Mô tả</label>
                            <textarea cols="30" rows="3" type="text" name="description" id="description" placeholder="" required></textarea>
                            <label for="option"> Thông số :</label>

                            <select name="option" id="option" required>
                                <option value="4">Option</option>
                                <option value="1" >Ô tô động cơ điện</option>
                                <option value="2">Ô tô động cơ xăng</option>
                                <option value="3">Xe máy điện</option>
                            </select>

                            <div id="form-option"></div>

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
                                            <div class="repeater">
                                                <div data-repeater-list="colorlist">
                                                    <div data-repeater-item class="data-repeater-item">
                                                        <div class="form-group data-repeater-form">
                                                            <label for="f2c6be2ae579c0933ac1457f64a44c1b">Tên màu</label>
                                                            <input class="form-control me-3" data-counter="40"
                                                            id="f2c6be2ae579c0933ac1457f64a44c1b"
                                                            name="color_name" type="text" multiple>

                                                            <div class="color-avatar">
                                                                <label for="f2c6be2ae579c0933ac1457f64a44c1b">Hình ảnh màu đại diện</label>
                                                                <div class="holder image-category" id="anchor-data-preview" value=""></div>
                                                                <span class="input-group-btn">
                                                                  <a class="text-primary link_a" id="anchor" data-input="anchor-data-input" data-preview="anchor-data-preview">
                                                                    Chọn ảnh
                                                                  </a>
                                                                </span>
                                                                <p class="p p-1 bg-span">48*48 px - Kích thước.</p>
                                                                <input class="form-control data-image-input" id="anchor-data-input" style="display: none" type="text" name="image" multiple>
                                                            </div>


                                                            <div class="color-product">

                                                                <label for="f2c6be2ae579c0933ac1457f64a44c1b">Hình ảnh sản phẩm đại diện</label>
                                                                <div class="holder image-category-car-0" id="anchor-data-preview-avatar" value="">
                                                                  <!-- Thêm ảnh đã upload vào đây -->
                                                                </div>
                                                                <span class="input-group-btn">
                                                                  <a class="text-primary link_a" id="anchor-avatar" data-input="anchor-data-input-avatar" data-preview="anchor-data-preview-avatar">
                                                                    Chọn ảnh
                                                                  </a>
                                                                </span>
                                                                <p class="p p-1 bg-span">700*350 px - Kích thước.</p>
                                                                <input class="form-control data-image-input" id="anchor-data-input-avatar" style="display: none" type="text" name="image_car" multiple >

                                                            </div>



                                                            </div>


                                                            <span data-repeater-delete type="button"
                                                            class="remove-item-button">
                                                            <i class="fa fa-times"></i>
                                                            </span>
                                                    </div>
                                                </div>
                                                <input data-repeater-create type="button" class="bg-add pt-3"
                                                    value="Add New" />
                                            </div>



                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>

                    </div>
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
                                            <option value="published" selected="selected">Published</option>
                                            <option value="draft">Bản nháp</option>
                                            <option value="pending">Đang chờ xử lý</option>
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

                                        <textarea class="form-control" cols="2" rows="2" name="noithat" id="editor1" placeholder="Nội dung" value=""></textarea>

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

                                        <textarea class="form-control" cols="2" rows="2" name="ngoaithat" id="editor2" placeholder="Nội dung" value=""></textarea>

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
                                <input type="munber" name="price_without_battery" id="price_without_battery" placeholder="" required value="" required />
                                <label for="mt-0">GIÁ XE GỒM PIN</label>
                                <input type="munber" name="price_with_battery" id="price_with_battery" placeholder="" required value="" required />

                                <label for="length">Dài:</label>
                                <input type="text" id="length" name="length" placeholder="4940" required><br>

                                <label for="width">Rộng:</label>
                                <input type="text" id="width" name="width" placeholder="1960" required><br>

                                <label for="height">Cao:</label>
                                <input type="text" id="height" name="height" placeholder="1773" required><br>
                                <label for="">Công suất tối đa</label>
                                <input type="text" name="Maximum_capacity" id="Maximum_capacity" placeholder="" required value="" required />
                                <label for="">Mô men xoắn cực đại</label>
                                <input type="text" name="Maximum_torque" id="Maximum_torque" placeholder="" required value="" required />
                                <label for="">Số ghế ngồi</label>
                                <input type="munber" name="seats" id="seats" placeholder="" required value="" required />


                                <label for="">Quãng đường di chuyển (chuẩn NEDC)</label>
                                <input type="munber" name="Travel_distance" id="Travel_distance" placeholder="" required value="" required />
                                <label for="">Dung lượng pin khả dụng</label>
                                <input type="text" name="pin" id="pin" placeholder="" required value="" required />
                                <label for="">Loại la-zăng</label>
                                <input type="text" name="la-zang" id="la-zang" placeholder="" required value="" required />
                                <label for="">Thời gian nạp pin nhanh nhất (10%-70%)</label>
                                <input type="munber" name="time-pin" id="time-pin" placeholder="" required value="" required />
                                <label for="">Túi khí</label>
                                <input type="munber" name="Air-bag" id="Air-bag" placeholder="" required value="" required />
    `;
        } else if (option.value === '2') {
            option_form.innerHTML = `

            <label for="length">Dài:</label>
                                <input type="text" id="length" name="length" placeholder="4940" required><br>

                                <label for="width">Rộng:</label>
                                <input type="text" id="width" name="width" placeholder="1960" required><br>

                                <label for="height">Cao:</label>
                                <input type="text" id="height" name="height" placeholder="1773" required><br>
                                <label for="wheelbase">Chiều dài cơ sở:</label>
                                <input type="text" id="wheelbase" name="wheelbase" placeholder="2933" required><br>

                                <label for="">Công suất tối đa</label>
                                <input type="text" name="Maximum_capacity" id="Maximum_capacity" placeholder="" required value="" required />
                                <label for="">Mô men xoắn cực đại</label>
                                <input type="text" name="Maximum_torque" id="Maximum_torque" placeholder="" required value="" required />
                                <label for="">Số ghế ngồi</label>
                                <input type="munber" name="seats" id="seats" placeholder="phút" required value="" required />
                                <label for="ground-clearance">Khoảng sáng gầm:</label>
                                <input type="text" id="ground-clearance" name="ground-clearance" placeholder="195" required><br>

                                <label for="fuel-capacity">Dung tích nhiên liệu:</label>
                                <input type="text" id="fuel-capacity" name="fuel-capacity" placeholder="85" required><br>

                                <label for="combined-fuel-economy">Mức tiêu thụ nhiên liệu (kết hợp):</label>
                                <input type="text" id="combined-fuel-economy" name="combined-fuel-economy" placeholder="8.39" required><br>

                                <label for="city-fuel-economy">Mức tiêu thụ nhiên liệu (đô thị):</label>
                                <input type="text" id="city-fuel-economy" name="city-fuel-economy" placeholder="10.46" required><br>

                                <label for="highway-fuel-economy">Mức tiêu thụ nhiên liệu (ngoài đô thị):</label>
                                <input type="text" id="highway-fuel-economy" name="highway-fuel-economy" placeholder="7.18" required><br>

                                <label for="engine-size">Động cơ:</label>
                                <input type="text" id="engine-size" name="engine-size" placeholder="2.0L" required><br>

                                <label for="transmission">Hộp số:</label>
                                <input type="text" id="transmission" name="transmission" required><br>

                                <label for="drive-type">Dẫn động:</label>
                                <input type="text" id="drive-type" name="drive-type" required><br>
    `;
        }else if (option.value === '3') {
            option_form.innerHTML = `
            <!-- Form for option 2 -->
                                <label for="charging-time">Thời gian sạc:</label>
                                <input type="text" id="charging-time" name="charging-time" placeholder="6 giờ" required><br>

                                <label for="engine-position">Động cơ đặt giữa:</label>
                                <input type="text" id="engine-position" name="engine-position" placeholder="Inhub" required><br>

                                <label for="rated-power">Công suất danh định:</label>
                                <input type="text" id="rated-power" name="rated-power" placeholder="1800 W" required><br>

                                <label for="suspension">Giảm xóc:</label>
                                <input type="text" id="suspension" name="suspension" placeholder="Ống lồng - giảm chấn thủy lực; giảm xóc đôi, giảm chấn thủy lực" required><br>

                                <label for="battery">PIN:</label>
                                <input type="text" id="battery" name="battery" placeholder="01 Pin LFP" required><br>

                                <label for="battery-capacity">Dung lượng PIN:</label>
                                <input type="text" id="battery-capacity" name="battery-capacity" placeholder="3.5 kWh" required><br>

                                <label for="max-speed">Tốc độ tối đa:</label>
                                <input type="text" id="max-speed" name="max-speed" placeholder="78 km/h" required><br>

                                <label for="wheelbase-distance">Khoảng cách trục bánh trước - sau:</label>
                                <input type="text" id="wheelbase-distance" name="wheelbase-distance" placeholder="1320 mm" required><br>

                                <label for="weight">Trọng lượng:</label>
                                <input type="text" id="weight" name="weight" placeholder="110 kg bao gồm pin LFP" required><br>

                                <label for="ground-clearance">Khoảng sáng gầm xe:</label>
                                <input type="text" id="ground-clearance" name="ground-clearance" placeholder="135 mm" required><br>

                                <label for="brakes">Phanh trước và sau:</label>
                                <input type="text" id="brakes" name="brakes" placeholder="Phanh đĩa/ cơ" required><br>
    `;
        }else if (option.value === '4') {
            option_form.innerHTML = ``}
        });
    </script>



    @endsection
