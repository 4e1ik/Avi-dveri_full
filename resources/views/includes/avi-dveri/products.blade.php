<div id="products" class="row">
    <!-- Single-product start -->
    @foreach($products as $product)
        <div data-price="{{$product->price}}" class="product col-lg-4 col-md-6">
            <div class="single-product">
                <div class="product-img">
                    @include('includes.avi-dveri.product_card_labels', ['product' => $product])
                    @include('includes.avi-dveri.product_card_images', ['product' => $product])
                </div>
                <div class="product-info clearfix text-center">
                    <div class="fix">
                        <div class="post-title"><a @include('includes.avi-dveri.product_route')>{{$product->title}}</a>
                        </div>
                        <span class="pro-price-2">от {{$product->price}} {{$product->currency}}</span>
                    </div>
                </div>
                <div class="product-details">
                    @include('includes.avi-dveri.product_card_details', ['product' => $product])
                </div>
            </div>
        </div>
    @endforeach
    <!-- Single-product end -->
</div>