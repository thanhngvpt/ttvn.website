<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\InforGroupRepositoryInterface;

class InforGroupRequest extends BaseRequest
{

    /** @var \App\Repositories\InforGroupRepositoryInterface */
    protected $inforGroupRepository;

    public function __construct(InforGroupRepositoryInterface $inforGroupRepository)
    {
        $this->inforGroupRepository = $inforGroupRepository;
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
        return $this->inforGroupRepository->rules();
    }

    public function messages()
    {
        return $this->inforGroupRepository->messages();
    }

}
