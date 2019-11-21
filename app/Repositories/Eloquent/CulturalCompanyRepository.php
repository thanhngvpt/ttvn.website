<?php namespace App\Repositories\Eloquent;

use \App\Repositories\CulturalCompanyRepositoryInterface;
use \App\Models\CulturalCompany;

class CulturalCompanyRepository extends SingleKeyModelRepository implements CulturalCompanyRepositoryInterface
{

    public function getBlankModel()
    {
        return new CulturalCompany();
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
