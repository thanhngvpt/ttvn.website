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
        $id = ($this->method() == 'PUT') ? $this->route('job') : 0;

        return $rules = [
            'slug'  => 'required|unique:jobs,slug,'.$id,
        ];
    }

    public function messages()
    {
        $message = [
            'slug.unique' => 'Slug đã tồn tại'
        ];

        return $message;
    }

}
