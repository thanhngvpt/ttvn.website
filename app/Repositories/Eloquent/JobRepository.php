<?php namespace App\Repositories\Eloquent;

use \App\Repositories\JobRepositoryInterface;
use \App\Models\Job;

class JobRepository extends SingleKeyModelRepository implements JobRepositoryInterface
{

    public function getBlankModel()
    {
        return new Job();
    }

    public function getByJobCategory($page,$category_id, $province, $keyword)
    {

        $page_size = 9;
        $offset = ($page - 1) * $page_size;

        $query = $this->getBlankModel()->where('is_enabled', 1);

        if ($category_id != 0) $query = $query->where('job_category_id', $category_id);
        if ($province != 'all') $query = $query->where('province', $province);
        if ($keyword != null) $query = $query->where('name', 'like', '%'.$keyword.'%');

        $count = $query->count();
        $total_page = intval($count / $page_size) + (($count % $page_size) == 0 ? 0 : 1);
        
        $jobs = $query->orderBy('order', 'asc')->orderBy('id', 'desc')->limit($page_size)->offset($offset)->get();

        return [
            'jobs' => $jobs,
            'total_page' => $total_page,
            'current_page' => $page,
            'count' => $count
        ];
        
    }
}
