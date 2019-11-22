<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\CadidateRepositoryInterface;

class CadidateRequest extends BaseRequest
{

    /** @var \App\Repositories\CadidateRepositoryInterface */
    protected $cadidateRepository;

    public function __construct(CadidateRepositoryInterface $cadidateRepository)
    {
        $this->cadidateRepository = $cadidateRepository;
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
        return $this->cadidateRepository->rules();
    }

    public function messages()
    {
        return $this->cadidateRepository->messages();
    }

}
