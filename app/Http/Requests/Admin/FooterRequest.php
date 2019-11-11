<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\FooterRepositoryInterface;

class FooterRequest extends BaseRequest
{

    /** @var \App\Repositories\FooterRepositoryInterface */
    protected $footerRepository;

    public function __construct(FooterRepositoryInterface $footerRepository)
    {
        $this->footerRepository = $footerRepository;
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
        return $this->footerRepository->rules();
    }

    public function messages()
    {
        return $this->footerRepository->messages();
    }

}
