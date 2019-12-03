<div class="slide-top-news">
    @foreach($news as $item)
        <a href="#" class="item-news" onclick="location.href='{!! action('Web\NewsController@details',[$item->newCategory->slug, $item->slug]) !!}'">
            <div class="img-news">
            <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
            </div>
            <div class="content-news">
            <div class="cate-news">
                {{@$item->newCategory->name}}
            </div>
            <div class="title-news">
                {{$item->name}}
            </div>
            <div class="date-news">
                {!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
            </div>
            </div>
        </a>
    @endforeach
</div>
<div class="text-center">
    <a href="{!! action('Web\NewsController@index', 'all') !!}" class="btn btn-outline-success btn-see-more-news">
        Xem tất cả
    </a>
</div>