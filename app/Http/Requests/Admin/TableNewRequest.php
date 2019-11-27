<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\TableNewRepositoryInterface;

class TableNewRequest extends BaseRequest
{

    /** @var \App\Repositories\TableNewRepositoryInterface */
    protected $tableNewRepository;

    public function __construct(TableNewRepositoryInterface $tableNewRepository)
    {
        $this->tableNewRepository = $tableNewRepository;
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
        $id = ($this->method() == 'PUT') ? $this->route('table_news') : 0;

        return $rules = [
            'slug'  => 'required|unique:table_news,slug,'.$id,
        ];
    }

    public function messages()
    {
        $message = [
            'slug.unique' => 'Slug đã tồn tại'
        ];

        return $message;
    }

}
