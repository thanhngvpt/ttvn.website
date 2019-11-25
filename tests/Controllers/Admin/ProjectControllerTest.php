<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class ProjectControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\ProjectController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\ProjectController::class);
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
        $response = $this->action('GET', 'Admin\ProjectController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\ProjectController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $project = factory(\App\Models\Project::class)->make();
        $this->action('POST', 'Admin\ProjectController@store', [
                '_token' => csrf_token(),
            ] + $project->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $project = factory(\App\Models\Project::class)->create();
        $this->action('GET', 'Admin\ProjectController@show', [$project->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $project = factory(\App\Models\Project::class)->create();

        $name = $faker->name;
        $id = $project->id;

        $project->name = $name;

        $this->action('PUT', 'Admin\ProjectController@update', [$id], [
                '_token' => csrf_token(),
            ] + $project->toArray());
        $this->assertResponseStatus(302);

        $newProject = \App\Models\Project::find($id);
        $this->assertEquals($name, $newProject->name);
    }

    public function testDeleteModel()
    {
        $project = factory(\App\Models\Project::class)->create();

        $id = $project->id;

        $this->action('DELETE', 'Admin\ProjectController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkProject = \App\Models\Project::find($id);
        $this->assertNull($checkProject);
    }

}
