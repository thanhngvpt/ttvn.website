<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\CompanyRepositoryInterface;

class CompanyRequest extends BaseRequest
{

    /** @var \App\Repositories\CompanyRepositoryInterface */
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->companyRepository->rules();
    }

    public function messages()
    {
        return $this->companyRepository->messages();
    }

}
