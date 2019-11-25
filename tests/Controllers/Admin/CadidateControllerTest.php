<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class CadidateControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\CadidateController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\CadidateController::class);
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
        $response = $this->action('GET', 'Admin\CadidateController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\CadidateController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $cadidate = factory(\App\Models\Cadidate::class)->make();
        $this->action('POST', 'Admin\CadidateController@store', [
                '_token' => csrf_token(),
            ] + $cadidate->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $cadidate = factory(\App\Models\Cadidate::class)->create();
        $this->action('GET', 'Admin\CadidateController@show', [$cadidate->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $cadidate = factory(\App\Models\Cadidate::class)->create();

        $name = $faker->name;
        $id = $cadidate->id;

        $cadidate->name = $name;

        $this->action('PUT', 'Admin\CadidateController@update', [$id], [
                '_token' => csrf_token(),
            ] + $cadidate->toArray());
        $this->assertResponseStatus(302);

        $newCadidate = \App\Models\Cadidate::find($id);
        $this->assertEquals($name, $newCadidate->name);
    }

    public function testDeleteModel()
    {
        $cadidate = factory(\App\Models\Cadidate::class)->create();

        $id = $cadidate->id;

        $this->action('DELETE', 'Admin\CadidateController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkCadidate = \App\Models\Cadidate::find($id);
        $this->assertNull($checkCadidate);
    }

}
