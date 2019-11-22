<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\LeaderShipRepositoryInterface;
use App\Http\Requests\Admin\LeaderShipRequest;
use App\Http\Requests\PaginationRequest;

class LeaderShipController extends Controller
{
    /** @var  \App\Repositories\LeaderShipRepositoryInterface */
    protected $leaderShipRepository;

    public function __construct(
        LeaderShipRepositoryInterface $leaderShipRepository
    ) {
        $this->leaderShipRepository = $leaderShipRepository;
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
        $paginate['baseUrl']    = action('Admin\LeaderShipController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->leaderShipRepository->countByFilter($filter);
        $leaderShips = $this->leaderShipRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.leader-ships.index',
            [
                'leaderShips'    => $leaderShips,
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
            'pages.admin.' . config('view.admin') . '.leader-ships.edit',
            [
                'isNew'     => true,
                'leaderShip' => $this->leaderShipRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(LeaderShipRequest $request)
    {
        $input = $request->only(
            [
                            'cover_image_id',
                            'name',
                            'position',
                            'file',
                            'order',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $leaderShip = $this->leaderShipRepository->create($input);

        if( empty($leaderShip) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\LeaderShipController@index')
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
        $leaderShip = $this->leaderShipRepository->find($id);
        if( empty($leaderShip) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.leader-ships.edit',
            [
                'isNew' => false,
                'leaderShip' => $leaderShip,
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
    public function update($id, LeaderShipRequest $request)
    {
        /** @var  \App\Models\LeaderShip $leaderShip */
        $leaderShip = $this->leaderShipRepository->find($id);
        if( empty($leaderShip) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'cover_image_id',
                            'name',
                            'position',
                            'file',
                            'order',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->leaderShipRepository->update($leaderShip, $input);

        return redirect()->action('Admin\LeaderShipController@show', [$id])
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
        /** @var  \App\Models\LeaderShip $leaderShip */
        $leaderShip = $this->leaderShipRepository->find($id);
        if( empty($leaderShip) ) {
            abort(404);
        }
        $this->leaderShipRepository->delete($leaderShip);

        return redirect()->action('Admin\LeaderShipController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
