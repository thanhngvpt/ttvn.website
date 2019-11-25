<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CadidateRepositoryInterface;
use App\Http\Requests\Admin\CadidateRequest;
use App\Http\Requests\PaginationRequest;

class CadidateController extends Controller
{
    /** @var  \App\Repositories\CadidateRepositoryInterface */
    protected $cadidateRepository;

    public function __construct(
        CadidateRepositoryInterface $cadidateRepository
    ) {
        $this->cadidateRepository = $cadidateRepository;
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
        $paginate['baseUrl']    = action('Admin\CadidateController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->cadidateRepository->countByFilter($filter);
        $cadidates = $this->cadidateRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.cadidates.index',
            [
                'cadidates'    => $cadidates,
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
            'pages.admin.' . config('view.admin') . '.cadidates.edit',
            [
                'isNew'     => true,
                'cadidate' => $this->cadidateRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(CadidateRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'phone',
                            'email',
                            'file',
                            'link_job',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $cadidate = $this->cadidateRepository->create($input);

        if( empty($cadidate) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\CadidateController@index')
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
        $cadidate = $this->cadidateRepository->find($id);
        if( empty($cadidate) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.cadidates.edit',
            [
                'isNew' => false,
                'cadidate' => $cadidate,
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
    public function update($id, CadidateRequest $request)
    {
        /** @var  \App\Models\Cadidate $cadidate */
        $cadidate = $this->cadidateRepository->find($id);
        if( empty($cadidate) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'phone',
                            'email',
                            'file',
                            'link_job',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->cadidateRepository->update($cadidate, $input);

        return redirect()->action('Admin\CadidateController@show', [$id])
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
        /** @var  \App\Models\Cadidate $cadidate */
        $cadidate = $this->cadidateRepository->find($id);
        if( empty($cadidate) ) {
            abort(404);
        }
        $this->cadidateRepository->delete($cadidate);

        return redirect()->action('Admin\CadidateController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
