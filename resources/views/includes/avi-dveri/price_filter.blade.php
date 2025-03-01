<aside class="widget shop-filter mb-30">
    <div class="widget-title">
        <h4>Цена</h4>
            <div class="price__label">
                <form action="" method="post">
                    @csrf


                        <label style="-webkit-appearance: none; -moz-appearance: none; appearance: none;" for="button1"><input name="price_filter" value="DESC" type="radio" id="button1"><button type="submit">↑</button></label>


                        <label style="-webkit-appearance: none; -moz-appearance: none; appearance: none;" for="button2"><input name="price_filter" value="ASC" type="radio" id="button2"><button type="submit">↓</button></label>

                </form>
            </div>
    </div>
    {{--<div class="widget-info">--}}
    {{--    <div class="price_filter">--}}
    {{--        <div class="price_slider_amount">--}}
    {{--            <input type="submit" value="Диапазон :"/>--}}
    {{--            <input type="text" id="amount" name="price" placeholder="Add Your Price"/>--}}
    {{--        </div>--}}
    {{--        <div id="slider-range"></div>--}}
    {{--    </div>--}}
    {{--</div>--}}
</aside>