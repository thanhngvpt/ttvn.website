<div class="news-slide">
        @foreach($hot_news as $hot_new)
        <div class="item-slide">
            <div class="item-slide-news">
                <div class="img-slide-news">
                    <img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
                </div>
                <div class="content-slide-news">
                    <button class="btn tag-news">
                        {{$hot_new->newCategory->name}}
                    </button>
                    <div class="title-slide-news">
                            {{$hot_new->name}}
                    </div>
                    <div class="des-slide-news">
                            {!!$hot_new->content!!}
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
            <div class="col-xl-4 col-md-6">
                <div class="item-news">
                    <div class="img-news">
                        <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
                    </div>
                    <div class="cate-news">
                            {{$item->newCategory->name}}
                    </div>
                    <div class="title-news">
                            {{$item->name}}
                    </div>
                    <div class="des-news">
                            {!!$item->content!!}
                    </div>
                    <div class="date-news">
                            {!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
            @for($i=1;$i<=$data['total_page'];$i++)
            <li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
    </div>