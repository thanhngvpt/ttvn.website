
@foreach($data['jobs'] as $job)
<tr>
    <td>
        <a href="#" class="name-job">
            {{$job->name}}
        </a>
        <div class="company-job">
            {{$job->company->name}}
        </div>
    </td>
    <td>{{$job->company->province}}</td>
    <td>{{$job->number}}</td>
    <td>{{$job->salary }} triệu</td>
    <td>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</td>
</tr>
@endforeach
