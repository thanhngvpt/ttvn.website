<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\DataHighLightRepositoryInterface;

class DataHighLightRequest extends BaseRequest
{

    /** @var \App\Repositories\DataHighLightRepositoryInterface */
    protected $dataHighLightRepository;

    public function __construct(DataHighLightRepositoryInterface $dataHighLightRepository)
    {
        $this->dataHighLightRepository = $dataHighLightRepository;
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
        return $this->dataHighLightRepository->rules();
    }

    public function messages()
    {
        return $this->dataHighLightRepository->messages();
    }

}
