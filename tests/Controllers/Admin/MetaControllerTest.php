<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class MetaControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\MetaController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\MetaController::class);
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
        $response = $this->action('GET', 'Admin\MetaController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\MetaController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $meta = factory(\App\Models\Meta::class)->make();
        $this->action('POST', 'Admin\MetaController@store', [
                '_token' => csrf_token(),
            ] + $meta->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $meta = factory(\App\Models\Meta::class)->create();
        $this->action('GET', 'Admin\MetaController@show', [$meta->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $meta = factory(\App\Models\Meta::class)->create();

        $name = $faker->name;
        $id = $meta->id;

        $meta->name = $name;

        $this->action('PUT', 'Admin\MetaController@update', [$id], [
                '_token' => csrf_token(),
            ] + $meta->toArray());
        $this->assertResponseStatus(302);

        $newMeta = \App\Models\Meta::find($id);
        $this->assertEquals($name, $newMeta->name);
    }

    public function testDeleteModel()
    {
        $meta = factory(\App\Models\Meta::class)->create();

        $id = $meta->id;

        $this->action('DELETE', 'Admin\MetaController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkMeta = \App\Models\Meta::find($id);
        $this->assertNull($checkMeta);
    }

}
