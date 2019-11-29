@foreach($data['jobs'] as $job)
    <div class="item-job-mb" onclick="location.href='{!! action('Web\JobController@detail', $job->slug) !!}'">
        <div class="name-job-mb">
                {{$job->name}}
        </div>
        <div class="des-job-mb">
                @if(empty($job->company))
                Công ty CP Tập đoàn Trường Thành Việt Nam (TTVN Group)
                @else
                {{$job->company->name}}
                @endif
        </div>
        <div class="info-job-mb">
            <img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
            <span>{{$job->province}}</span>
        </div>
        <div class="info-job-mb">
            <img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
            <span>{{$job->number}}</span>
        </div>
        <div class="info-job-mb">
            <img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
            <span>{{$job->salary }} triệu</span>
        </div>
        <div class="info-job-mb">
            <img src="{{ asset('images/icon-info-4.svg') }}" class="img-fluid" />
            <span>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</span>
        </div>
    </div>
@endforeach
