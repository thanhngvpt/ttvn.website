<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FieldRepositoryInterface;
use App\Http\Requests\Admin\FieldRequest;
use App\Http\Requests\PaginationRequest;

class FieldController extends Controller
{
    /** @var  \App\Repositories\FieldRepositoryInterface */
    protected $fieldRepository;

    public function __construct(
        FieldRepositoryInterface $fieldRepository
    ) {
        $this->fieldRepository = $fieldRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param    \App\Http\Requests\PaginationRequest $request
     * @return  \Response
     */
    public function index(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = action('Admin\FieldController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->fieldRepository->countByFilter($filter);
        $fields = $this->fieldRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.fields.index',
            [
                'fields'    => $fields,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Response
     */
    public function create()
    {
        return view(
            'pages.admin.' . config('view.admin') . '.fields.edit',
            [
                'isNew'     => true,
                'field' => $this->fieldRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(FieldRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'slug',
                            'meta_title',
                            'meta_description',
                            'cover_image_id',
                            'title',
                            'content',
                            'icon1_image_id',
                            'charact_1',
                            'des_1',
                            'icon2_image_id',
                            'charact_2',
                            'des_2',
                            'icon3_image_id',
                            'charact_3',
                            'des_3',
                            'order',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $field = $this->fieldRepository->create($input);

        if( empty($field) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\FieldController@index')
            ->with('message-success', trans('admin.messages.general.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param    int $id
     * @return  \Response
     */
    public function show($id)
    {
        $field = $this->fieldRepository->find($id);
        if( empty($field) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.fields.edit',
            [
                'isNew' => false,
                'field' => $field,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int $id
     * @return  \Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    int $id
     * @param            $request
     * @return  \Response
     */
    public function update($id, FieldRequest $request)
    {
        /** @var  \App\Models\Field $field */
        $field = $this->fieldRepository->find($id);
        if( empty($field) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'slug',
                            'meta_title',
                            'meta_description',
                            'cover_image_id',
                            'title',
                            'content',
                            'icon1_image_id',
                            'charact_1',
                            'des_1',
                            'icon2_image_id',
                            'charact_2',
                            'des_2',
                            'icon3_image_id',
                            'charact_3',
                            'des_3',
                            'order',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->fieldRepository->update($field, $input);

        return redirect()->action('Admin\FieldController@show', [$id])
                    ->with('message-success', trans('admin.messages.general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Response
     */
    public function destroy($id)
    {
        /** @var  \App\Models\Field $field */
        $field = $this->fieldRepository->find($id);
        if( empty($field) ) {
            abort(404);
        }
        $this->fieldRepository->delete($field);

        return redirect()->action('Admin\FieldController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
