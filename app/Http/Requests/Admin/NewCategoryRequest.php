<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\NewCategoryRepositoryInterface;

class NewCategoryRequest extends BaseRequest
{

    /** @var \App\Repositories\NewCategoryRepositoryInterface */
    protected $newCategoryRepository;

    public function __construct(NewCategoryRepositoryInterface $newCategoryRepository)
    {
        $this->newCategoryRepository = $newCategoryRepository;
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
        return $this->newCategoryRepository->rules();
    }

    public function messages()
    {
        return $this->newCategoryRepository->messages();
    }

}
