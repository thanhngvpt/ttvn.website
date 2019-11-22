<?php namespace App\Repositories\Eloquent;

use \App\Repositories\CompanyRepositoryInterface;
use \App\Models\Company;

class CompanyRepository extends SingleKeyModelRepository implements CompanyRepositoryInterface
{

    public function getBlankModel()
    {
        return new Company();
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
