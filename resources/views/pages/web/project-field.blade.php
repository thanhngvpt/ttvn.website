@foreach($projects as $project)
    <div class="slide-item">
        <div class="item-wrapper">
            <div class="slide-item-thumb">
                    @if(!empty($project->present()->coverImage()))
                <img src="{!! $project->present()->coverImage()->present()->url !!}" class="img-fluid" />
                @endif
            </div>
            <div class="slide-item-content">
                <div class="slide-item-title">{{$project->name}}</div>
                <div class="slide-item-desc">{{$project->address}}</div>
            </div>
        </div>
    </div>
@endforeach