
@foreach($data['jobs'] as $job)
<tr data-link="{!! action('Web\JobController@detail', $job->slug) !!}" class="cursor-pointer click-action">
    <td>
        <a href="#" class="name-job">
            {{$job->name}}
        </a>
        <div class="company-job">
            @if(empty($job->company))
            Công ty CP Tập đoàn Trường Thành Việt Nam (TTVN Group)
            @else
            {{$job->company->name}}
            @endif
        </div>
    </td>
    <td>{{$job->province}}</td>
    <td>{{$job->number}}</td>
    <td>{{$job->salary }}</td>
    <td>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</td>
</tr>
<tr class="row-spacer"><td colspan="100"></td></tr>
@endforeach
