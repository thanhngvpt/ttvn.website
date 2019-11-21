<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\JobCategoryRepositoryInterface;

class JobCategoryRequest extends BaseRequest
{

    /** @var \App\Repositories\JobCategoryRepositoryInterface */
    protected $jobCategoryRepository;

    public function __construct(JobCategoryRepositoryInterface $jobCategoryRepository)
    {
        $this->jobCategoryRepository = $jobCategoryRepository;
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
        return $this->jobCategoryRepository->rules();
    }

    public function messages()
    {
        return $this->jobCategoryRepository->messages();
    }

}
