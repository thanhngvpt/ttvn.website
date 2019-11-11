<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class InforGroupControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\InforGroupController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\InforGroupController::class);
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
        $response = $this->action('GET', 'Admin\InforGroupController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\InforGroupController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $inforGroup = factory(\App\Models\InforGroup::class)->make();
        $this->action('POST', 'Admin\InforGroupController@store', [
                '_token' => csrf_token(),
            ] + $inforGroup->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $inforGroup = factory(\App\Models\InforGroup::class)->create();
        $this->action('GET', 'Admin\InforGroupController@show', [$inforGroup->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $inforGroup = factory(\App\Models\InforGroup::class)->create();

        $name = $faker->name;
        $id = $inforGroup->id;

        $inforGroup->name = $name;

        $this->action('PUT', 'Admin\InforGroupController@update', [$id], [
                '_token' => csrf_token(),
            ] + $inforGroup->toArray());
        $this->assertResponseStatus(302);

        $newInforGroup = \App\Models\InforGroup::find($id);
        $this->assertEquals($name, $newInforGroup->name);
    }

    public function testDeleteModel()
    {
        $inforGroup = factory(\App\Models\InforGroup::class)->create();

        $id = $inforGroup->id;

        $this->action('DELETE', 'Admin\InforGroupController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkInforGroup = \App\Models\InforGroup::find($id);
        $this->assertNull($checkInforGroup);
    }

}
