<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\BannerRepositoryInterface;

class BannerRequest extends BaseRequest
{

    /** @var \App\Repositories\BannerRepositoryInterface */
    protected $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
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
        return $this->bannerRepository->rules();
    }

    public function messages()
    {
        return $this->bannerRepository->messages();
    }

}
