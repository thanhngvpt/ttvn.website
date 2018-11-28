<div class="dataTables_paginate paging_full_numbers">
    <ul class="pagination" style="justify-content: center;">
        @if( isset($firstPageLink) )
            <li class="paginate_button page-item first" id="m_table_1_first">
                <a href="{!! $firstPageLink!!}" aria-controls="m_table_1" data-dt-idx="0" tabindex="0" class="page-link">
                    <i class="la la-angle-double-left"></i>
                </a>
            </li>
        @else
            <li class="paginate_button page-item first disabled" id="m_table_1_first">
                <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="0" tabindex="0" class="page-link">
                    <i class="la la-angle-double-left"></i>
                </a>
            </li>
        @endif

        @if( isset($previousPageLink) && ($previousPageLink != "") )
            <li class="paginate_button page-item previous" id="m_table_1_previous">
                <a href="{!! $previousPageLink !!}" aria-controls="m_table_1" data-dt-idx="1" tabindex="0" class="page-link">
                    <i class="la la-angle-left"></i>
                </a>
            </li>
        @else
            <li class="paginate_button page-item previous disabled" id="m_table_1_previous">
                <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="1" tabindex="0" class="page-link">
                    <i class="la la-angle-left"></i>
                </a>
            </li>
        @endif

        @foreach( $pages as $page)
            @if( $page['current'] )
                <li class="paginate_button page-item active">
                    <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="{{ $page['number'] + 1 }}" tabindex="0" class="page-link">{{ $page['number'] }}</a>
                </li>
            @else
                <li class="paginate_button page-item ">
                    <a href="{!! $page['link'] !!}" aria-controls="m_table_1" data-dt-idx="{{ $page['number'] + 1 }}" tabindex="0" class="page-link">
                        {{ $page['number'] }}
                    </a>
                </li>
            @endif
        @endforeach

        @if( isset($nextPageLink) && ($nextPageLink != "") )
            <li class="paginate_button page-item next" id="m_table_1_next">
                <a href="{!! $nextPageLink !!}" aria-controls="m_table_1" data-dt-idx="1" tabindex="0" class="page-link">
                    <i class="la la-angle-right"></i>
                </a>
            </li>
        @else
            <li class="paginate_button page-item next" id="m_table_1_next">
                <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="7" tabindex="0" class="page-link">
                    <i class="la la-angle-right"></i>
                </a>
            </li>
        @endif

        @if( isset($lastPageLink) )
            <li class="paginate_button page-item last" id="m_table_1_last">
                <a href="{!! $lastPageLink !!}" aria-controls="m_table_1" data-dt-idx="8" tabindex="0" class="page-link">
                    <i class="la la-angle-double-right"></i>
                </a>
            </li>
        @else
            <li class="paginate_button page-item last disabled" id="m_table_1_last">
                <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="8" tabindex="0" class="page-link">
                    <i class="la la-angle-double-right"></i>
                </a>
            </li>
        @endif
    </ul>
</div>