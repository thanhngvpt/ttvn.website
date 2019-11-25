<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class JobCategoryControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\JobCategoryController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\JobCategoryController::class);
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
        $response = $this->action('GET', 'Admin\JobCategoryController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\JobCategoryController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $jobCategory = factory(\App\Models\JobCategory::class)->make();
        $this->action('POST', 'Admin\JobCategoryController@store', [
                '_token' => csrf_token(),
            ] + $jobCategory->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $jobCategory = factory(\App\Models\JobCategory::class)->create();
        $this->action('GET', 'Admin\JobCategoryController@show', [$jobCategory->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $jobCategory = factory(\App\Models\JobCategory::class)->create();

        $name = $faker->name;
        $id = $jobCategory->id;

        $jobCategory->name = $name;

        $this->action('PUT', 'Admin\JobCategoryController@update', [$id], [
                '_token' => csrf_token(),
            ] + $jobCategory->toArray());
        $this->assertResponseStatus(302);

        $newJobCategory = \App\Models\JobCategory::find($id);
        $this->assertEquals($name, $newJobCategory->name);
    }

    public function testDeleteModel()
    {
        $jobCategory = factory(\App\Models\JobCategory::class)->create();

        $id = $jobCategory->id;

        $this->action('DELETE', 'Admin\JobCategoryController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkJobCategory = \App\Models\JobCategory::find($id);
        $this->assertNull($checkJobCategory);
    }

}
