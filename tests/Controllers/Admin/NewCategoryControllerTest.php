<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class NewCategoryControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\NewCategoryController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\NewCategoryController::class);
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
        $response = $this->action('GET', 'Admin\NewCategoryController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\NewCategoryController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $newCategory = factory(\App\Models\NewCategory::class)->make();
        $this->action('POST', 'Admin\NewCategoryController@store', [
                '_token' => csrf_token(),
            ] + $newCategory->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $newCategory = factory(\App\Models\NewCategory::class)->create();
        $this->action('GET', 'Admin\NewCategoryController@show', [$newCategory->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $newCategory = factory(\App\Models\NewCategory::class)->create();

        $name = $faker->name;
        $id = $newCategory->id;

        $newCategory->name = $name;

        $this->action('PUT', 'Admin\NewCategoryController@update', [$id], [
                '_token' => csrf_token(),
            ] + $newCategory->toArray());
        $this->assertResponseStatus(302);

        $newNewCategory = \App\Models\NewCategory::find($id);
        $this->assertEquals($name, $newNewCategory->name);
    }

    public function testDeleteModel()
    {
        $newCategory = factory(\App\Models\NewCategory::class)->create();

        $id = $newCategory->id;

        $this->action('DELETE', 'Admin\NewCategoryController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkNewCategory = \App\Models\NewCategory::find($id);
        $this->assertNull($checkNewCategory);
    }

}
