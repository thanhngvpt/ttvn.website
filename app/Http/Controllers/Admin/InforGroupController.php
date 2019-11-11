<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\InforGroupRepositoryInterface;
use App\Http\Requests\Admin\InforGroupRequest;
use App\Http\Requests\PaginationRequest;

class InforGroupController extends Controller
{
    /** @var  \App\Repositories\InforGroupRepositoryInterface */
    protected $inforGroupRepository;

    public function __construct(
        InforGroupRepositoryInterface $inforGroupRepository
    ) {
        $this->inforGroupRepository = $inforGroupRepository;
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
        $paginate['baseUrl']    = action('Admin\InforGroupController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->inforGroupRepository->countByFilter($filter);
        $inforGroups = $this->inforGroupRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.infor-groups.index',
            [
                'inforGroups'    => $inforGroups,
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
            'pages.admin.' . config('view.admin') . '.infor-groups.edit',
            [
                'isNew'     => true,
                'inforGroup' => $this->inforGroupRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(InforGroupRequest $request)
    {
        $input = $request->only(
            [
                            'cover_image_id',
                            'thumbnail_image_id',
                            'description',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $inforGroup = $this->inforGroupRepository->create($input);

        if( empty($inforGroup) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\InforGroupController@index')
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
        $inforGroup = $this->inforGroupRepository->find($id);
        if( empty($inforGroup) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.infor-groups.edit',
            [
                'isNew' => false,
                'inforGroup' => $inforGroup,
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
    public function update($id, InforGroupRequest $request)
    {
        /** @var  \App\Models\InforGroup $inforGroup */
        $inforGroup = $this->inforGroupRepository->find($id);
        if( empty($inforGroup) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'cover_image_id',
                            'thumbnail_image_id',
                            'description',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->inforGroupRepository->update($inforGroup, $input);

        return redirect()->action('Admin\InforGroupController@show', [$id])
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
        /** @var  \App\Models\InforGroup $inforGroup */
        $inforGroup = $this->inforGroupRepository->find($id);
        if( empty($inforGroup) ) {
            abort(404);
        }
        $this->inforGroupRepository->delete($inforGroup);

        return redirect()->action('Admin\InforGroupController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
