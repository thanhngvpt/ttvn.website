<?php namespace Tests\Repositories;

use App\Models\Project;
use Tests\TestCase;

class ProjectRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\ProjectRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ProjectRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $projects = factory(Project::class, 3)->create();
        $projectIds = $projects->pluck('id')->toArray();

        /** @var  \App\Repositories\ProjectRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ProjectRepositoryInterface::class);
        $this->assertNotNull($repository);

        $projectsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Project::class, $projectsCheck[0]);

        $projectsCheck = $repository->getByIds($projectIds);
        $this->assertEquals(3, count($projectsCheck));
    }

    public function testFind()
    {
        $projects = factory(Project::class, 3)->create();
        $projectIds = $projects->pluck('id')->toArray();

        /** @var  \App\Repositories\ProjectRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ProjectRepositoryInterface::class);
        $this->assertNotNull($repository);

        $projectCheck = $repository->find($projectIds[0]);
        $this->assertEquals($projectIds[0], $projectCheck->id);
    }

    public function testCreate()
    {
        $projectData = factory(Project::class)->make();

        /** @var  \App\Repositories\ProjectRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ProjectRepositoryInterface::class);
        $this->assertNotNull($repository);

        $projectCheck = $repository->create($projectData->toFillableArray());
        $this->assertNotNull($projectCheck);
    }

    public function testUpdate()
    {
        $projectData = factory(Project::class)->create();

        /** @var  \App\Repositories\ProjectRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ProjectRepositoryInterface::class);
        $this->assertNotNull($repository);

        $projectCheck = $repository->update($projectData, $projectData->toFillableArray());
        $this->assertNotNull($projectCheck);
    }

    public function testDelete()
    {
        $projectData = factory(Project::class)->create();

        /** @var  \App\Repositories\ProjectRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ProjectRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($projectData);

        $projectCheck = $repository->find($projectData->id);
        $this->assertNull($projectCheck);
    }

}
