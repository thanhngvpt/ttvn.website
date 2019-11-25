<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\HeadingRepositoryInterface;

class HeadingRequest extends BaseRequest
{

    /** @var \App\Repositories\HeadingRepositoryInterface */
    protected $headingRepository;

    public function __construct(HeadingRepositoryInterface $headingRepository)
    {
        $this->headingRepository = $headingRepository;
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
        return $this->headingRepository->rules();
    }

    public function messages()
    {
        return $this->headingRepository->messages();
    }

}
