<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CriteriaCandidateRepositoryInterface;
use App\Http\Requests\Admin\CriteriaCandidateRequest;
use App\Http\Requests\PaginationRequest;

class CriteriaCandidateController extends Controller
{
    /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface */
    protected $criteriaCandidateRepository;

    public function __construct(
        CriteriaCandidateRepositoryInterface $criteriaCandidateRepository
    ) {
        $this->criteriaCandidateRepository = $criteriaCandidateRepository;
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
        $paginate['baseUrl']    = action('Admin\CriteriaCandidateController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->criteriaCandidateRepository->countByFilter($filter);
        $criteriaCandidates = $this->criteriaCandidateRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.criteria-candidates.index',
            [
                'criteriaCandidates'    => $criteriaCandidates,
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
            'pages.admin.' . config('view.admin') . '.criteria-candidates.edit',
            [
                'isNew'     => true,
                'criteriaCandidate' => $this->criteriaCandidateRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(CriteriaCandidateRequest $request)
    {
        $input = $request->only(
            [
                            'icon_image_id',
                            'name',
                            'content',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $criteriaCandidate = $this->criteriaCandidateRepository->create($input);

        if( empty($criteriaCandidate) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\CriteriaCandidateController@index')
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
        $criteriaCandidate = $this->criteriaCandidateRepository->find($id);
        if( empty($criteriaCandidate) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.criteria-candidates.edit',
            [
                'isNew' => false,
                'criteriaCandidate' => $criteriaCandidate,
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
    public function update($id, CriteriaCandidateRequest $request)
    {
        /** @var  \App\Models\CriteriaCandidate $criteriaCandidate */
        $criteriaCandidate = $this->criteriaCandidateRepository->find($id);
        if( empty($criteriaCandidate) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'icon_image_id',
                            'name',
                            'content',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->criteriaCandidateRepository->update($criteriaCandidate, $input);

        return redirect()->action('Admin\CriteriaCandidateController@show', [$id])
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
        /** @var  \App\Models\CriteriaCandidate $criteriaCandidate */
        $criteriaCandidate = $this->criteriaCandidateRepository->find($id);
        if( empty($criteriaCandidate) ) {
            abort(404);
        }
        $this->criteriaCandidateRepository->delete($criteriaCandidate);

        return redirect()->action('Admin\CriteriaCandidateController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
