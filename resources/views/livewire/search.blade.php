<form class="d-flex">
    <div>
        <input type="text" wire:model.live="searchTerm" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;"/>
        @if(sizeof($results) >  0)
        <div style="position: absolute; top: 80px; left: 65%; right: 10px; max-height: 300px; overflow-y: auto; z-index: 1000; background: #fff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 10px; width: 25%; ">
            @foreach($results as $result)
                <a href="{{route('product_page', ['id' => $result->id, 'class' => get_class($result)])}}">
                    <p style="margin: 5px 0; padding: 10px; background: #f9f9f9; border-radius: 5px; transition: background 0.3s ease; cursor: pointer; ">
                        {{$result->title}}
                    </p>
                </a>
            @endforeach
        </div>
        @endif
        <style>
            div > p:hover {
                background: #e6e6e6;
            }
        </style>
    </div>
    <a class="search-img" href="#">
        <img src="{{asset('/avi-dveri_assets/avi-dveri/img/search.png')}}" alt="" width="30" height="30" class="d-inline-block align-top" alt="CoreUI Logo">
    </a>
</form>