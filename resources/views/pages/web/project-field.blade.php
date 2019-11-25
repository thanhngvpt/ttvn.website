<div class="slide-projects">
@foreach($projects as $project)
<a href="#" class="item-news">
    <div class="img-news">
    <img src="{!! $project->present()->coverImage()->present()->url !!}" class="img-fluid" />
    </div>
    <div class="content-news">
    <div class="title-news">
        {{$project->name}}
    </div>
    <div class="des-news">
        {{$project->address}}
    </div>
    </div>
</a>
@endforeach
</div>