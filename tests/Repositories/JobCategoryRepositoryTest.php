<?php namespace Tests\Repositories;

use App\Models\JobCategory;
use Tests\TestCase;

class JobCategoryRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\JobCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $jobCategories = factory(JobCategory::class, 3)->create();
        $jobCategoryIds = $jobCategories->pluck('id')->toArray();

        /** @var  \App\Repositories\JobCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCategoriesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(JobCategory::class, $jobCategoriesCheck[0]);

        $jobCategoriesCheck = $repository->getByIds($jobCategoryIds);
        $this->assertEquals(3, count($jobCategoriesCheck));
    }

    public function testFind()
    {
        $jobCategories = factory(JobCategory::class, 3)->create();
        $jobCategoryIds = $jobCategories->pluck('id')->toArray();

        /** @var  \App\Repositories\JobCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCategoryCheck = $repository->find($jobCategoryIds[0]);
        $this->assertEquals($jobCategoryIds[0], $jobCategoryCheck->id);
    }

    public function testCreate()
    {
        $jobCategoryData = factory(JobCategory::class)->make();

        /** @var  \App\Repositories\JobCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCategoryCheck = $repository->create($jobCategoryData->toFillableArray());
        $this->assertNotNull($jobCategoryCheck);
    }

    public function testUpdate()
    {
        $jobCategoryData = factory(JobCategory::class)->create();

        /** @var  \App\Repositories\JobCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $jobCategoryCheck = $repository->update($jobCategoryData, $jobCategoryData->toFillableArray());
        $this->assertNotNull($jobCategoryCheck);
    }

    public function testDelete()
    {
        $jobCategoryData = factory(JobCategory::class)->create();

        /** @var  \App\Repositories\JobCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\JobCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($jobCategoryData);

        $jobCategoryCheck = $repository->find($jobCategoryData->id);
        $this->assertNull($jobCategoryCheck);
    }

}
