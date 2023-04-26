@isset($static_data)


    <section class="section">

        <div id="content" class="" style=" padding:1rem 0;">
            @foreach ($static_data['pricelist'] as $value)
                <div class="content-main container">
                    <div class="header-content flexb-c pb-0 text-center">
                        <div class="text mb-4">
                            <h3>{{ $value->description }}</h3>
                        </div>
                    </div>
                </div>

                <div class="content-main container">
                    <div class="header-content flexb-c pb-0 text-center">
                        <div class="text  col-12">
                            {!! $value->content !!}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="content-main container">
                <div class="header-content flexb-c pb-0 text-center">
                    <div class="table col-12">
                        @foreach ($static_data['pricelist'] as $value)
                            <table class="table-home table-home-1">
                                <thead class="pt-2 pb-2">
                                    <tr class="col-lg-12 col-xl-12 col-xxl-12" style="border: none;">
                                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Loại xe</th>
                                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Kich thước xe</th>
                                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Giá mở cửa 10km đầu</th>
                                        <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">KM11-KM50</th>
                                        <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">51-100KM</th>
                                        <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">> 100KM</th>
                                        <th scope="col" class="col-lg-2 col-xl-2 col-xxl-2">Thời gian chờ</th>
                                        <th scope="col" class="col-lg-1 col-xl-1 col-xxl-1">Lưu đêm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($value->pricelist) as $key => $value)
                                        <tr class="col-lg-12 col-xl-12 col-xxl-12">
                                            <td scope="row" class="col-lg-2 col-xl-2 col-xxl-2" data-label="Loại xe">
                                                {{ $value->type }}
                                            </td>
                                            <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Kich thước xe">
                                                {{ $value->size }}</td>
                                            <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Giá mở cửa 10km đầu">
                                                {{ $value->value }} đ</td>
                                            <td class="col-lg-1 col-xl-1 col-xxl-1" data-label="KM11-KM50">
                                                {{ $value->price10 }} đ</td>
                                            <td class="col-lg-1 col-xl-1 col-xxl-1" data-label="51-100KM">
                                                {{ $value->price51_100 }} đ</td>
                                            <td class="col-lg-1 col-xl-1 col-xxl-1" data-label="> 100KM">
                                                {{ $value->price100 }} đ</td>
                                            <td class="col-lg-2 col-xl-2 col-xxl-2" data-label="Thời gian chờ">
                                                {{ $value->time }} đ/giờ</td>
                                            <td class="col-lg-1 col-xl-1 col-xxl-1" data-label="Lưu đêm">
                                                {{ $value->save_night }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                        @foreach ($static_data['pricelist-tow'] as $value)
                            <div class="header-content flexb-c pb-0 text-center col-12">
                                <div class="text mb-4 mt-4">
                                    <h3>
                                        <h3>{{ $value->description }}</h3>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                        <div class="table-1">

                            <table class="table-home table-home-2">
                                <thead>
                                    <tr class="col-lg-12 col-xl-12 col-xxl-12">
                                        <th scope="col" class="col-lg-6 col-xl-6 col-xxl-6">Loại xe</th>
                                        <th scope="col" class="col-lg-6 col-xl-6 col-xxl-6">Phí bốc xếp 2 đầu</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody" data-mh="tbody">
                                    @foreach (json_decode($value->pricelist) as $key => $value)
                                        <tr class="col-lg-12 col-xl-12 col-xxl-12">
                                            <td scope="row" class="col-lg-6 col-xl-6 col-xxl-6" data-label="Loại xe">
                                                {{ $value->type }}
                                            </td>
                                            <td class="col-lg-6 col-xl-6 col-xxl-6" data-label="Phí bốc xếp 2 đầu">
                                                {{ $value->price }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <table class="table-home table-home-2">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-lg-6 col-xl-6 col-xxl-6">Lưu ý</th>

                                    </tr>
                                </thead>
                                <tbody class="tbody" data-mh="tbody">
                                    <tr>
                                        <td scope="row" class="td-style col-lg-6 col-xl-6 col-xxl-6"
                                            data-label="Lưu ý">
                                            @foreach ($static_data['pricelist-tow'] as $value)
                                                {!! $value->content !!}
                                            @endforeach
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

    </section>

@endisset
