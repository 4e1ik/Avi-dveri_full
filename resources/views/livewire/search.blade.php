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
        @if(sizeof($results) >  0)
        <div class="search_example" style="">
            @foreach($results as $result)
                <a href="{{route('product_page', ['id' => $result->id, 'class' => get_class($result)])}}">
                    <p class="search_text">
                        {{$result->title}}
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