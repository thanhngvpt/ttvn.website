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
