<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\MetaRepositoryInterface;

class MetaRequest extends BaseRequest
{

    /** @var \App\Repositories\MetaRepositoryInterface */
    protected $metaRepository;

    public function __construct(MetaRepositoryInterface $metaRepository)
    {
        $this->metaRepository = $metaRepository;
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
        return $this->metaRepository->rules();
    }

    public function messages()
    {
        return $this->metaRepository->messages();
    }

}
