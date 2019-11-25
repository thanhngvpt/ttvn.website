<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\IntroduceRepositoryInterface;

class IntroduceRequest extends BaseRequest
{

    /** @var \App\Repositories\IntroduceRepositoryInterface */
    protected $introduceRepository;

    public function __construct(IntroduceRepositoryInterface $introduceRepository)
    {
        $this->introduceRepository = $introduceRepository;
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
        return $this->introduceRepository->rules();
    }

    public function messages()
    {
        return $this->introduceRepository->messages();
    }

}
