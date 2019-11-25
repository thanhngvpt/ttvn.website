<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\CulturalCompanyRepositoryInterface;

class CulturalCompanyRequest extends BaseRequest
{

    /** @var \App\Repositories\CulturalCompanyRepositoryInterface */
    protected $culturalCompanyRepository;

    public function __construct(CulturalCompanyRepositoryInterface $culturalCompanyRepository)
    {
        $this->culturalCompanyRepository = $culturalCompanyRepository;
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
        return $this->culturalCompanyRepository->rules();
    }

    public function messages()
    {
        return $this->culturalCompanyRepository->messages();
    }

}
