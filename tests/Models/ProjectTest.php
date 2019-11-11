<?php namespace Tests\Models;

use App\Models\Project;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Project $project */
        $project = new Project();
        $this->assertNotNull($project);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Project $project */
        $projectModel = new Project();

        $projectData = factory(Project::class)->make();
        foreach( $projectData->toFillableArray() as $key => $value ) {
            $projectModel->$key = $value;
        }
        $projectModel->save();

        $this->assertNotNull(Project::find($projectModel->id));
    }

}
