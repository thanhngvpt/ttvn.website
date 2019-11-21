<?php namespace App\Repositories\Eloquent;

use \App\Repositories\BannerRepositoryInterface;
use \App\Models\Banner;

class BannerRepository extends SingleKeyModelRepository implements BannerRepositoryInterface
{

    public function getBlankModel()
    {
        return new Banner();
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
