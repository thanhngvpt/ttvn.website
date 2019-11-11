<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\FieldRepositoryInterface;

class FieldRequest extends BaseRequest
{

    /** @var \App\Repositories\FieldRepositoryInterface */
    protected $fieldRepository;

    public function __construct(FieldRepositoryInterface $fieldRepository)
    {
        $this->fieldRepository = $fieldRepository;
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
        return $this->fieldRepository->rules();
    }

    public function messages()
    {
        return $this->fieldRepository->messages();
    }

}
