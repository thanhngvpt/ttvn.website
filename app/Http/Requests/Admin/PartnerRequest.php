<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\PartnerRepositoryInterface;

class PartnerRequest extends BaseRequest
{

    /** @var \App\Repositories\PartnerRepositoryInterface */
    protected $partnerRepository;

    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
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
        return $this->partnerRepository->rules();
    }

    public function messages()
    {
        return $this->partnerRepository->messages();
    }

}
