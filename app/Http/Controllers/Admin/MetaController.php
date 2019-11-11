<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\MetaRepositoryInterface;
use App\Http\Requests\Admin\MetaRequest;
use App\Http\Requests\PaginationRequest;

class MetaController extends Controller
{
    /** @var  \App\Repositories\MetaRepositoryInterface */
    protected $metaRepository;

    public function __construct(
        MetaRepositoryInterface $metaRepository
    ) {
        $this->metaRepository = $metaRepository;
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
        $paginate['baseUrl']    = action('Admin\MetaController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->metaRepository->countByFilter($filter);
        $metas = $this->metaRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.metas.index',
            [
                'metas'    => $metas,
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
            'pages.admin.' . config('view.admin') . '.metas.edit',
            [
                'isNew'     => true,
                'meta' => $this->metaRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(MetaRequest $request)
    {
        $input = $request->only(
            [
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $meta = $this->metaRepository->create($input);

        if( empty($meta) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\MetaController@index')
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
        $meta = $this->metaRepository->find($id);
        if( empty($meta) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.metas.edit',
            [
                'isNew' => false,
                'meta' => $meta,
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
    public function update($id, MetaRequest $request)
    {
        /** @var  \App\Models\Meta $meta */
        $meta = $this->metaRepository->find($id);
        if( empty($meta) ) {
            abort(404);
        }

        $input = $request->only(
            [
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->metaRepository->update($meta, $input);

        return redirect()->action('Admin\MetaController@show', [$id])
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
        /** @var  \App\Models\Meta $meta */
        $meta = $this->metaRepository->find($id);
        if( empty($meta) ) {
            abort(404);
        }
        $this->metaRepository->delete($meta);

        return redirect()->action('Admin\MetaController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
