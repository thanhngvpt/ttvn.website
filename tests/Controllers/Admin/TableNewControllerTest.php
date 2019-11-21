<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class TableNewControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\TableNewController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\TableNewController::class);
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
        $response = $this->action('GET', 'Admin\TableNewController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\TableNewController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $tableNew = factory(\App\Models\TableNew::class)->make();
        $this->action('POST', 'Admin\TableNewController@store', [
                '_token' => csrf_token(),
            ] + $tableNew->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $tableNew = factory(\App\Models\TableNew::class)->create();
        $this->action('GET', 'Admin\TableNewController@show', [$tableNew->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $tableNew = factory(\App\Models\TableNew::class)->create();

        $name = $faker->name;
        $id = $tableNew->id;

        $tableNew->name = $name;

        $this->action('PUT', 'Admin\TableNewController@update', [$id], [
                '_token' => csrf_token(),
            ] + $tableNew->toArray());
        $this->assertResponseStatus(302);

        $newTableNew = \App\Models\TableNew::find($id);
        $this->assertEquals($name, $newTableNew->name);
    }

    public function testDeleteModel()
    {
        $tableNew = factory(\App\Models\TableNew::class)->create();

        $id = $tableNew->id;

        $this->action('DELETE', 'Admin\TableNewController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkTableNew = \App\Models\TableNew::find($id);
        $this->assertNull($checkTableNew);
    }

}
