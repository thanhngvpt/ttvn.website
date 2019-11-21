<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\ContactRepositoryInterface;

class ContactRequest extends BaseRequest
{

    /** @var \App\Repositories\ContactRepositoryInterface */
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
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
        return $this->contactRepository->rules();
    }

    public function messages()
    {
        return $this->contactRepository->messages();
    }

}
