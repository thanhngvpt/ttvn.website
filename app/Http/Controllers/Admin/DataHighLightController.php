<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\DataHighLightRepositoryInterface;
use App\Http\Requests\Admin\DataHighLightRequest;
use App\Http\Requests\PaginationRequest;

class DataHighLightController extends Controller
{
    /** @var  \App\Repositories\DataHighLightRepositoryInterface */
    protected $dataHighLightRepository;

    public function __construct(
        DataHighLightRepositoryInterface $dataHighLightRepository
    ) {
        $this->dataHighLightRepository = $dataHighLightRepository;
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
        $paginate['baseUrl']    = action('Admin\DataHighLightController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->dataHighLightRepository->countByFilter($filter);
        $dataHighLights = $this->dataHighLightRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.data-high-lights.index',
            [
                'dataHighLights'    => $dataHighLights,
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
            'pages.admin.' . config('view.admin') . '.data-high-lights.edit',
            [
                'isNew'     => true,
                'dataHighLight' => $this->dataHighLightRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(DataHighLightRequest $request)
    {
        $input = $request->only(
            [
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $dataHighLight = $this->dataHighLightRepository->create($input);

        if( empty($dataHighLight) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\DataHighLightController@index')
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
        $dataHighLight = $this->dataHighLightRepository->find($id);
        if( empty($dataHighLight) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.data-high-lights.edit',
            [
                'isNew' => false,
                'dataHighLight' => $dataHighLight,
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
    public function update($id, DataHighLightRequest $request)
    {
        /** @var  \App\Models\DataHighLight $dataHighLight */
        $dataHighLight = $this->dataHighLightRepository->find($id);
        if( empty($dataHighLight) ) {
            abort(404);
        }

        $input = $request->only(
            [
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->dataHighLightRepository->update($dataHighLight, $input);

        return redirect()->action('Admin\DataHighLightController@show', [$id])
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
        /** @var  \App\Models\DataHighLight $dataHighLight */
        $dataHighLight = $this->dataHighLightRepository->find($id);
        if( empty($dataHighLight) ) {
            abort(404);
        }
        $this->dataHighLightRepository->delete($dataHighLight);

        return redirect()->action('Admin\DataHighLightController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
