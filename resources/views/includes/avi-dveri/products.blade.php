<div id="products" class="row">
    <!-- Single-product start -->
    @foreach($products as $product)
        <div data-price="{{$product->price}}" class="product col-lg-4 col-md-6">
            <div class="single-product">
                <div class="product-img">
                    @if($product->label !== null)
                        <div class="lables">
                            @foreach($product->label as $item)
                                @if ($item === 'native')
                                    <span class="pro-label-native" aria-label="На родныя тавары">
                                        <span class="pro-label-native__track">
                                            <span class="pro-label-native__pill">4%</span>
                                            <span class="pro-label-native__expand">На родныя тавары</span>
                                        </span>
                                    </span>
                                @else
                                    <span class="pro-label {{$item == 'new'?('new-label'):($item == 'sale'?('sale-label'):($item == 'order'?('order-label'):('hit-label')))}}">{{$item == 'new'?('Новинка'):($item == 'sale'?('Скидка'):($item == 'order'?('На заказ'):('Хит')))}}</span>
                                @endif
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