<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\HistoryRepositoryInterface;
use App\Http\Requests\Admin\HistoryRequest;
use App\Http\Requests\PaginationRequest;

class HistoryController extends Controller
{
    /** @var  \App\Repositories\HistoryRepositoryInterface */
    protected $historyRepository;

    public function __construct(
        HistoryRepositoryInterface $historyRepository
    ) {
        $this->historyRepository = $historyRepository;
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
        $paginate['baseUrl']    = action('Admin\HistoryController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->historyRepository->countByFilter($filter);
        $histories = $this->historyRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.histories.index',
            [
                'histories'    => $histories,
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
            'pages.admin.' . config('view.admin') . '.histories.edit',
            [
                'isNew'     => true,
                'history' => $this->historyRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(HistoryRequest $request)
    {
        $input = $request->only(
            [
                            'date_start',
                            'cover_image_id',
                            'content',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $history = $this->historyRepository->create($input);

        if( empty($history) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\HistoryController@index')
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
        $history = $this->historyRepository->find($id);
        if( empty($history) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.histories.edit',
            [
                'isNew' => false,
                'history' => $history,
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
    public function update($id, HistoryRequest $request)
    {
        /** @var  \App\Models\History $history */
        $history = $this->historyRepository->find($id);
        if( empty($history) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'date_start',
                            'cover_image_id',
                            'content',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->historyRepository->update($history, $input);

        return redirect()->action('Admin\HistoryController@show', [$id])
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
        /** @var  \App\Models\History $history */
        $history = $this->historyRepository->find($id);
        if( empty($history) ) {
            abort(404);
        }
        $this->historyRepository->delete($history);

        return redirect()->action('Admin\HistoryController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
