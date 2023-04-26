

<section id="slide-product">
    <div class="container">
        <div class="content-text ">
           <h2>SẢN PHẨM  <span>TIÊU BIỂU</span></h2>
        </div>
        <div class="cards slide-auto">
            @foreach ($Product as $row)
                <div class="card m:2px">
                    <img src="{{ asset('storage/photos/1/products/'.$row->images) }}" alt="" class="card-image" />
                    <div class="card-content">
                        <div class="card-top">
                            <h3 class="card-title" data-mh="card-title"><a href="{{ route('product-detail', ['table' => "Product",'id' => $row->id]);}}" >{{ $row->name }}</a></h3>
                            <div class="card-user" style="margin-top: 0;">
                                <div class="card-user-info" style="padding-left: 0px;">
                                    {{--                              <div class="card-user-top">
                                    </div> --}}
                                    <div class="line_clamp_3" > {{ $row->description }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <button class="card-live">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>SHOP</span>
                            </button>
                            <div {{-- class="card-watching" --}}>{{ $row->price }} VND</div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>


