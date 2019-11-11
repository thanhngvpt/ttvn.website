<?php namespace App\Repositories\Eloquent;

use \App\Repositories\FooterRepositoryInterface;
use \App\Models\Footer;

class FooterRepository extends SingleKeyModelRepository implements FooterRepositoryInterface
{

    public function getBlankModel()
    {
        return new Footer();
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
