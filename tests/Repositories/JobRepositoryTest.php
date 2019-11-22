<?php namespace Tests\Repositories;

use App\Models\Job;
use Tests\TestCase;

class JobRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\JobRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $jobs = factory(Job::class, 3)->create();
        $jobIds = $jobs->pluck('id')->toArray();

        /** @var  \App\Repositories\JobRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Job::class, $jobsCheck[0]);

        $jobsCheck = $repository->getByIds($jobIds);
        $this->assertEquals(3, count($jobsCheck));
    }

    public function testFind()
    {
        $jobs = factory(Job::class, 3)->create();
        $jobIds = $jobs->pluck('id')->toArray();

        /** @var  \App\Repositories\JobRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCheck = $repository->find($jobIds[0]);
        $this->assertEquals($jobIds[0], $jobCheck->id);
    }

    public function testCreate()
    {
        $jobData = factory(Job::class)->make();

        /** @var  \App\Repositories\JobRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCheck = $repository->create($jobData->toFillableArray());
        $this->assertNotNull($jobCheck);
    }

    public function testUpdate()
    {
        $jobData = factory(Job::class)->create();

        /** @var  \App\Repositories\JobRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCheck = $repository->update($jobData, $jobData->toFillableArray());
        $this->assertNotNull($jobCheck);
    }

    public function testDelete()
    {
        $jobData = factory(Job::class)->create();

        /** @var  \App\Repositories\JobRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($jobData);

        $jobCheck = $repository->find($jobData->id);
        $this->assertNull($jobCheck);
    }

}
