<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\HistoryRepositoryInterface;

class HistoryRequest extends BaseRequest
{

    /** @var \App\Repositories\HistoryRepositoryInterface */
    protected $historyRepository;

    public function __construct(HistoryRepositoryInterface $historyRepository)
    {
        $this->historyRepository = $historyRepository;
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
        return $this->historyRepository->rules();
    }

    public function messages()
    {
        return $this->historyRepository->messages();
    }

}
