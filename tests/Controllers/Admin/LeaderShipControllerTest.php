<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class LeaderShipControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\LeaderShipController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\LeaderShipController::class);
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
        $response = $this->action('GET', 'Admin\LeaderShipController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\LeaderShipController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $leaderShip = factory(\App\Models\LeaderShip::class)->make();
        $this->action('POST', 'Admin\LeaderShipController@store', [
                '_token' => csrf_token(),
            ] + $leaderShip->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $leaderShip = factory(\App\Models\LeaderShip::class)->create();
        $this->action('GET', 'Admin\LeaderShipController@show', [$leaderShip->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $leaderShip = factory(\App\Models\LeaderShip::class)->create();

        $name = $faker->name;
        $id = $leaderShip->id;

        $leaderShip->name = $name;

        $this->action('PUT', 'Admin\LeaderShipController@update', [$id], [
                '_token' => csrf_token(),
            ] + $leaderShip->toArray());
        $this->assertResponseStatus(302);

        $newLeaderShip = \App\Models\LeaderShip::find($id);
        $this->assertEquals($name, $newLeaderShip->name);
    }

    public function testDeleteModel()
    {
        $leaderShip = factory(\App\Models\LeaderShip::class)->create();

        $id = $leaderShip->id;

        $this->action('DELETE', 'Admin\LeaderShipController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkLeaderShip = \App\Models\LeaderShip::find($id);
        $this->assertNull($checkLeaderShip);
    }

}
