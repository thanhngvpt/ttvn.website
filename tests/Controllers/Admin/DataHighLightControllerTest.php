<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class DataHighLightControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\DataHighLightController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\DataHighLightController::class);
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
        $response = $this->action('GET', 'Admin\DataHighLightController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\DataHighLightController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $dataHighLight = factory(\App\Models\DataHighLight::class)->make();
        $this->action('POST', 'Admin\DataHighLightController@store', [
                '_token' => csrf_token(),
            ] + $dataHighLight->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $dataHighLight = factory(\App\Models\DataHighLight::class)->create();
        $this->action('GET', 'Admin\DataHighLightController@show', [$dataHighLight->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $dataHighLight = factory(\App\Models\DataHighLight::class)->create();

        $name = $faker->name;
        $id = $dataHighLight->id;

        $dataHighLight->name = $name;

        $this->action('PUT', 'Admin\DataHighLightController@update', [$id], [
                '_token' => csrf_token(),
            ] + $dataHighLight->toArray());
        $this->assertResponseStatus(302);

        $newDataHighLight = \App\Models\DataHighLight::find($id);
        $this->assertEquals($name, $newDataHighLight->name);
    }

    public function testDeleteModel()
    {
        $dataHighLight = factory(\App\Models\DataHighLight::class)->create();

        $id = $dataHighLight->id;

        $this->action('DELETE', 'Admin\DataHighLightController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkDataHighLight = \App\Models\DataHighLight::find($id);
        $this->assertNull($checkDataHighLight);
    }

}
