<section id="slide-product">
    <div class="slide-product-main container">
        <div class="content-text ">
           <h2>SẢN PHẨM  <span>TIÊU BIỂU</span></h2>
        </div>
        <div class="product_main_slider">
            @foreach ($Product as $row)
            <div class="slider">
                <div class="cards">
                    <div class="card" data-mh="my-group">
                        <img src="{{ $row->images }}" alt="" class="card-image" />
                        <div class="card-content">
                            <div class="card-top">
                                <h3 class="card-title"><a href="">{{ $row->name}}</a></h3>
                                <div class="card-user">
                                    <img src="https://images.unsplash.com/photo-1418065460487-3e41a6c84dc5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                        alt="" class="card-user-avatar" />
                                    <div class="card-user-info">
                                        <div class="card-user-top">
                                            <h4 class="card-user-name">Tam Tran</h4>
                                            <ion-icon name="checkmark-circle"></ion-icon>
                                        </div>
                                        <div class="card-user-game">Call of duty</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-bottom">
                                <div class="card-live">
                                    <ion-icon name="wifi"></ion-icon>
                                    <span>Price</span>
                                </div>
                                <div class="card-watching">{{$row->price}} VND</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
