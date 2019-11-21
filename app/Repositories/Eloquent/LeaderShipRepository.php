<?php namespace App\Repositories\Eloquent;

use \App\Repositories\LeaderShipRepositoryInterface;
use \App\Models\LeaderShip;

class LeaderShipRepository extends SingleKeyModelRepository implements LeaderShipRepositoryInterface
{

    public function getBlankModel()
    {
        return new LeaderShip();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
