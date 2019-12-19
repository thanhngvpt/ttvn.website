<div class="news-slide">
    @foreach($hot_news as $hot_new)
    <div class="item-slide" onclick="location.href='{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}'">
        <div class="item-slide-news">
            <div class="img-slide-news" @if(!empty($hot_new->present()->coverImage())) style="background-image: url({!! $hot_new->present()->coverImage()->present()->url !!});" @endif>
                    @if(!empty($hot_new->present()->coverImage()))
                <img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
                @endif
            </div>
            <div class="content-slide-news">
                <button class="btn tag-news">
                    {{@$hot_new->newCategory->name}}
                </button>
                <div class="title-slide-news">
                        {{$hot_new->name}}
                </div>
                <div class="des-slide-news">
                        {!!$hot_new->sapo!!}
                </div>
                <div class="date-slide-news">
                        {!!  date('d/m/Y', (strtotime( $hot_new->created_at))) !!}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    <div class="news-content">
        <div class="row list-news">
            @foreach($data['news'] as $item)
            <div class="col-xl-4 col-md-6" onclick="location.href='{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}'">
                <div class="item-news">
                    <div class="img-news">
                            @if(!empty($item->present()->coverImage()))
                        <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
                        @endif
                    </div>
                    <div class="cate-news">
                            {{@$item->newCategory->name}}
                    </div>
                    <div class="title-news">
                            {{$item->name}}
                    </div>
                    <div class="des-news">
                            {!!$item->sapo!!}
                    </div>
                    <div class="date-news">
                            {!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($data['total_page'] > 1)
        <ul class="pagination">
            <li class="page-item previous-page"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
            @for($i=1;$i<=$data['total_page'];$i++)
            <li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
            @endfor
            <li class="page-item next-page"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
        @endif
    </div>
