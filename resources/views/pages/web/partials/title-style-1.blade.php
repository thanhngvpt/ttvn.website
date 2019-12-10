<div class="section-title-page title-style-1">
    <div class="style-wrapper">
        <div class="style-bg-left"></div>
        <div class="style-bg-right">
            <div class="border-bottom"></div>
        </div>
        <div class="style-container">
            @if (!empty($html))
            <!-- <h1 class="page-title-main"></h1> -->
                <div class="wrapper-content">
                    {!! $content !!}
                </div>
            @else
                <h1 class="page-title-main">{{ $content ?? '' }}</h1>
            @endif
        </div>
    </div>
</div>