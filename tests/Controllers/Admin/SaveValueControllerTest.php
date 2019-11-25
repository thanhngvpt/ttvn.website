<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class SaveValueControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\SaveValueController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\SaveValueController::class);
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
        $response = $this->action('GET', 'Admin\SaveValueController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\SaveValueController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $saveValue = factory(\App\Models\SaveValue::class)->make();
        $this->action('POST', 'Admin\SaveValueController@store', [
                '_token' => csrf_token(),
            ] + $saveValue->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $saveValue = factory(\App\Models\SaveValue::class)->create();
        $this->action('GET', 'Admin\SaveValueController@show', [$saveValue->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $saveValue = factory(\App\Models\SaveValue::class)->create();

        $name = $faker->name;
        $id = $saveValue->id;

        $saveValue->name = $name;

        $this->action('PUT', 'Admin\SaveValueController@update', [$id], [
                '_token' => csrf_token(),
            ] + $saveValue->toArray());
        $this->assertResponseStatus(302);

        $newSaveValue = \App\Models\SaveValue::find($id);
        $this->assertEquals($name, $newSaveValue->name);
    }

    public function testDeleteModel()
    {
        $saveValue = factory(\App\Models\SaveValue::class)->create();

        $id = $saveValue->id;

        $this->action('DELETE', 'Admin\SaveValueController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkSaveValue = \App\Models\SaveValue::find($id);
        $this->assertNull($checkSaveValue);
    }

}
