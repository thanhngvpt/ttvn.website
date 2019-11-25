<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\JobRepositoryInterface;

class JobRequest extends BaseRequest
{

    /** @var \App\Repositories\JobRepositoryInterface */
    protected $jobRepository;

    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
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
        return $this->jobRepository->rules();
    }

    public function messages()
    {
        return $this->jobRepository->messages();
    }

}
