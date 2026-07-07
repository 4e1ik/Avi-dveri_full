<form class="d-flex search_form">
    <div class="search_form_group">
        <input placeholder="ПОИСК" type="text" wire:model.live="searchTerm">
        @if(sizeof($products) > 0)
            <div class="search_example">
                @foreach($products as $product)
                    <a @include('includes.avi-dveri.product_route')>
                        <p class="search_text">{{ $product->title }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</form>
