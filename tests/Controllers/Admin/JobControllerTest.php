<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class JobControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\JobController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\JobController::class);
        $this->assertNotNull($controller);
    }

    public function setUp()
    {
        parent::setUp();
        $authUser = \App\Models\AdminUser::first();
        $this->be($authUser, 'admins');
    }

    public function testGetList()
    {
        $response = $this->action('GET', 'Admin\JobController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\JobController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $job = factory(\App\Models\Job::class)->make();
        $this->action('POST', 'Admin\JobController@store', [
                '_token' => csrf_token(),
            ] + $job->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $job = factory(\App\Models\Job::class)->create();
        $this->action('GET', 'Admin\JobController@show', [$job->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $job = factory(\App\Models\Job::class)->create();

        $name = $faker->name;
        $id = $job->id;

        $job->name = $name;

        $this->action('PUT', 'Admin\JobController@update', [$id], [
                '_token' => csrf_token(),
            ] + $job->toArray());
        $this->assertResponseStatus(302);

        $newJob = \App\Models\Job::find($id);
        $this->assertEquals($name, $newJob->name);
    }

    public function testDeleteModel()
    {
        $job = factory(\App\Models\Job::class)->create();

        $id = $job->id;

        $this->action('DELETE', 'Admin\JobController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkJob = \App\Models\Job::find($id);
        $this->assertNull($checkJob);
    }

}
