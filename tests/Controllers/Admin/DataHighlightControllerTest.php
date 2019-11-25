<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class DataHighlightControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\DataHighlightController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\DataHighlightController::class);
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
        $response = $this->action('GET', 'Admin\DataHighlightController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\DataHighlightController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $dataHighlight = factory(\App\Models\DataHighlight::class)->make();
        $this->action('POST', 'Admin\DataHighlightController@store', [
                '_token' => csrf_token(),
            ] + $dataHighlight->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $dataHighlight = factory(\App\Models\DataHighlight::class)->create();
        $this->action('GET', 'Admin\DataHighlightController@show', [$dataHighlight->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $dataHighlight = factory(\App\Models\DataHighlight::class)->create();

        $name = $faker->name;
        $id = $dataHighlight->id;

        $dataHighlight->name = $name;

        $this->action('PUT', 'Admin\DataHighlightController@update', [$id], [
                '_token' => csrf_token(),
            ] + $dataHighlight->toArray());
        $this->assertResponseStatus(302);

        $newDataHighlight = \App\Models\DataHighlight::find($id);
        $this->assertEquals($name, $newDataHighlight->name);
    }

    public function testDeleteModel()
    {
        $dataHighlight = factory(\App\Models\DataHighlight::class)->create();

        $id = $dataHighlight->id;

        $this->action('DELETE', 'Admin\DataHighlightController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkDataHighlight = \App\Models\DataHighlight::find($id);
        $this->assertNull($checkDataHighlight);
    }

}
