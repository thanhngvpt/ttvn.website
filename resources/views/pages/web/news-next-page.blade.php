<div class="row list-news">
        @foreach($data['news'] as $item)
        <div class="col-xl-4 col-md-6" onclick="location.href='{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}'">
            <div class="item-news">
                <div class="img-news">
                    <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
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
    <ul class="pagination">
        <li class="page-item previous-page"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
        @for($i=1;$i<=$data['total_page'];$i++)
        <li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
        @endfor
        <li class="page-item next-page"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
    </ul>
</div>
