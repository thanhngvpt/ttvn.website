<?php namespace Tests\Models;

use App\Models\Job;
use Tests\TestCase;

class JobTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Job $job */
        $job = new Job();
        $this->assertNotNull($job);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Job $job */
        $jobModel = new Job();

        $jobData = factory(Job::class)->make();
        foreach( $jobData->toFillableArray() as $key => $value ) {
            $jobModel->$key = $value;
        }
        $jobModel->save();

        $this->assertNotNull(Job::find($jobModel->id));
    }

}
