<?php namespace Tests\Models;

use App\Models\JobCategory;
use Tests\TestCase;

class JobCategoryTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\JobCategory $jobCategory */
        $jobCategory = new JobCategory();
        $this->assertNotNull($jobCategory);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\JobCategory $jobCategory */
        $jobCategoryModel = new JobCategory();

        $jobCategoryData = factory(JobCategory::class)->make();
        foreach( $jobCategoryData->toFillableArray() as $key => $value ) {
            $jobCategoryModel->$key = $value;
        }
        $jobCategoryModel->save();

        $this->assertNotNull(JobCategory::find($jobCategoryModel->id));
    }

}
