@if($data['total_page'] > 1)
<li class="page-item previous-page"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
    @for($i=1;$i<=$data['total_page'];$i++)
        <li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
    @endfor
<li class="page-item next-page"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
endif