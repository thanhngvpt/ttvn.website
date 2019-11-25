<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class IntroduceControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\IntroduceController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\IntroduceController::class);
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
        $response = $this->action('GET', 'Admin\IntroduceController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\IntroduceController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $introduce = factory(\App\Models\Introduce::class)->make();
        $this->action('POST', 'Admin\IntroduceController@store', [
                '_token' => csrf_token(),
            ] + $introduce->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $introduce = factory(\App\Models\Introduce::class)->create();
        $this->action('GET', 'Admin\IntroduceController@show', [$introduce->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $introduce = factory(\App\Models\Introduce::class)->create();

        $name = $faker->name;
        $id = $introduce->id;

        $introduce->name = $name;

        $this->action('PUT', 'Admin\IntroduceController@update', [$id], [
                '_token' => csrf_token(),
            ] + $introduce->toArray());
        $this->assertResponseStatus(302);

        $newIntroduce = \App\Models\Introduce::find($id);
        $this->assertEquals($name, $newIntroduce->name);
    }

    public function testDeleteModel()
    {
        $introduce = factory(\App\Models\Introduce::class)->create();

        $id = $introduce->id;

        $this->action('DELETE', 'Admin\IntroduceController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkIntroduce = \App\Models\Introduce::find($id);
        $this->assertNull($checkIntroduce);
    }

}
