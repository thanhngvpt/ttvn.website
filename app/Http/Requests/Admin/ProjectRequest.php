<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\ProjectRepositoryInterface;

class ProjectRequest extends BaseRequest
{

    /** @var \App\Repositories\ProjectRepositoryInterface */
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
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
        return $this->projectRepository->rules();
    }

    public function messages()
    {
        return $this->projectRepository->messages();
    }

}
