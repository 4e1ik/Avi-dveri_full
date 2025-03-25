{{--<style>--}}
{{--    div > p:hover {--}}
{{--        background: #e6e6e6;--}}
{{--    }--}}

{{--    .d-flex > input {--}}

{{--    }--}}



{{--</style>--}}

<form class="d-flex search_form">
    <div class="search_form_group">
        <input placeholder="ПОИСК" type="text" wire:model.live="searchTerm"
        @if(sizeof($products) >  0)
        <div class="search_example" style="">
            @foreach($products as $product)
                <a @include('includes.avi-dveri.product_route')>
                    <p class="search_text">
                        {{$product->title}}
                    </p>
                </a>
            @endforeach
        </div>
        @endif

    </div>
{{--    <a class="search-img" href="#">--}}
{{--        <img src="{{asset('/avi-dveri_assets/avi-dveri/img/search.png')}}" alt="" width="30" height="30" class="align-top" alt="CoreUI Logo">--}}
{{--    </a>--}}
</form>