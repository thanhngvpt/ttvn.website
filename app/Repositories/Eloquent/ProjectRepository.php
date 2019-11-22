<?php namespace App\Repositories\Eloquent;

use \App\Repositories\ProjectRepositoryInterface;
use \App\Models\Project;

class ProjectRepository extends SingleKeyModelRepository implements ProjectRepositoryInterface
{

    public function getBlankModel()
    {
        return new Project();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
