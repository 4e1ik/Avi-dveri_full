<div id="products" class="row">
    <!-- Single-product start -->
    @foreach($products as $product)
        <div data-price="{{$product->price}}" class="product col-lg-4 col-md-6">
            <div class="single-product">
                <div class="product-img">
                    @if($product->label !== null)
                        <div class="lables">
                            @foreach($product->label as $item)
                                <span class="pro-label {{$item == 'new'?('new-label'):($item == 'sale'?('sale-label'):($item == 'order'?('order-label'):('hit-label')))}}">{{$item == 'new'?('Новинка'):($item == 'sale'?('Скидка'):($item == 'order'?('На заказ'):('Хит')))}}</span>
                            @endforeach
                        </div>
                    @endif
                    @if($product->images->isNotEmpty())
                        <a style="display: flex; justify-content: center;" @include('includes.avi-dveri.product_route')><img
                                style="object-fit: contain;"
                                src="{{ asset( 'storage/'. $product->images[0]->image ) }}"
                                alt=""/></a>
                    @endif
                </div>
                <div class="product-info clearfix text-center">
                    <div class="fix">
                        <h4 class="post-title"><a @include('includes.avi-dveri.product_route')>{{$product->title}}</a>
                        </h4>
                        <span class="pro-price-2">{{$product->price}} {{$product->currency}}</span>
                    </div>
                </div>
                <div class="product-details">
                    <ul>
                        @if(isset($product->door->glass))
                            <li>Стекло: {{$product->door->glass}}</li>
                        @endif
                        @if(isset($product->door->material))
                            <li>Материал: {{$product->door->material}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Single-product end -->
</div>