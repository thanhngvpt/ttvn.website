<div class="news-slide">
    @foreach($hot_news as $hot_new)
    <div class="item-slide">
        <div class="item-slide-news">
            @if ($hot_new->newCategory)
            <a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="img-slide-news" @if(!empty($hot_new->present()->coverImage())) style="background-image: url({!! $hot_new->present()->coverImage()->present()->url !!});" @endif>
                @if(!empty($hot_new->present()->coverImage()))
                    <img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
                @endif
            </a>
            <div class="content-slide-news">
                <div class="btn tag-news cursor-normal">
                    {{@$hot_new->newCategory->name}}
                </div>
                <a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="title-slide-news">
                        {{$hot_new->name}}
                </a>
                <a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="des-slide-news">
                        {!!$hot_new->sapo!!}
                </a>
                <a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="date-slide-news">
                    @php
                        $added_at = !empty($hot_new->added_on) ? $hot_new->added_on : null;
                        $added_at = !$added_at && !empty($hot_new->created_at) ? $hot_new->created_at : null;
                    @endphp
                        {!!  date('d/m/Y', (strtotime( $added_at))) !!}
                </a>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
    <div class="news-content">
        <div class="list-news">
            @foreach($data['news'] as $item)
            <div class="col-item-news">
                @if ($item->newCategory)
                <div class="item-news">
                    <a href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="img-news">
                            @if(!empty($item->present()->coverImage()))
                        <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
                        @endif
                    </a>
                    <a href="{!! route('news.category', $hot_new->newCategory->slug) !!}" class="cate-news">
                            {{@$item->newCategory->name}}
                    </a>
                    <a  href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="title-news">
                            {{$item->name}}
                    </a>
                    <a  href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="des-news">
                            {!!$item->sapo!!}
                    </a>
                    <a  href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="date-news">
                        @php
                            $added_at = !empty($item->added_on) ? $item->added_on : null;
                            $added_at = !$added_at && !empty($item->created_at) ? $item->created_at : null;
                        @endphp
                            {!!  date('d/m/Y', (strtotime( $added_at))) !!}
                    </a>
                </div>
                @endif
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
