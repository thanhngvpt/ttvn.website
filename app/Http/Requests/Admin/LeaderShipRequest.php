<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\LeaderShipRepositoryInterface;

class LeaderShipRequest extends BaseRequest
{

    /** @var \App\Repositories\LeaderShipRepositoryInterface */
    protected $leaderShipRepository;

    public function __construct(LeaderShipRepositoryInterface $leaderShipRepository)
    {
        $this->leaderShipRepository = $leaderShipRepository;
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
        return $this->leaderShipRepository->rules();
    }

    public function messages()
    {
        return $this->leaderShipRepository->messages();
    }

}
