<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\CriteriaCandidateRepositoryInterface;

class CriteriaCandidateRequest extends BaseRequest
{

    /** @var \App\Repositories\CriteriaCandidateRepositoryInterface */
    protected $criteriaCandidateRepository;

    public function __construct(CriteriaCandidateRepositoryInterface $criteriaCandidateRepository)
    {
        $this->criteriaCandidateRepository = $criteriaCandidateRepository;
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
        return $this->criteriaCandidateRepository->rules();
    }

    public function messages()
    {
        return $this->criteriaCandidateRepository->messages();
    }

}
