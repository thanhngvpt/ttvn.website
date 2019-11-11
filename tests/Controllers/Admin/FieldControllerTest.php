<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class FieldControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\FieldController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\FieldController::class);
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
        $response = $this->action('GET', 'Admin\FieldController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\FieldController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $field = factory(\App\Models\Field::class)->make();
        $this->action('POST', 'Admin\FieldController@store', [
                '_token' => csrf_token(),
            ] + $field->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $field = factory(\App\Models\Field::class)->create();
        $this->action('GET', 'Admin\FieldController@show', [$field->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $field = factory(\App\Models\Field::class)->create();

        $name = $faker->name;
        $id = $field->id;

        $field->name = $name;

        $this->action('PUT', 'Admin\FieldController@update', [$id], [
                '_token' => csrf_token(),
            ] + $field->toArray());
        $this->assertResponseStatus(302);

        $newField = \App\Models\Field::find($id);
        $this->assertEquals($name, $newField->name);
    }

    public function testDeleteModel()
    {
        $field = factory(\App\Models\Field::class)->create();

        $id = $field->id;

        $this->action('DELETE', 'Admin\FieldController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkField = \App\Models\Field::find($id);
        $this->assertNull($checkField);
    }

}
