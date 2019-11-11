<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\VideoRepositoryInterface;

class VideoRequest extends BaseRequest
{

    /** @var \App\Repositories\VideoRepositoryInterface */
    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
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
        return $this->videoRepository->rules();
    }

    public function messages()
    {
        return $this->videoRepository->messages();
    }

}
