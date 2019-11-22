<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\SaveValueRepositoryInterface;

class SaveValueRequest extends BaseRequest
{

    /** @var \App\Repositories\SaveValueRepositoryInterface */
    protected $saveValueRepository;

    public function __construct(SaveValueRepositoryInterface $saveValueRepository)
    {
        $this->saveValueRepository = $saveValueRepository;
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
        return $this->saveValueRepository->rules();
    }

    public function messages()
    {
        return $this->saveValueRepository->messages();
    }

}
