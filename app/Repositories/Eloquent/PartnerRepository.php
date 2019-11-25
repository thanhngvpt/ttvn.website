<?php namespace App\Repositories\Eloquent;

use \App\Repositories\PartnerRepositoryInterface;
use \App\Models\Partner;

class PartnerRepository extends SingleKeyModelRepository implements PartnerRepositoryInterface
{

    public function getBlankModel()
    {
        return new Partner();
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
