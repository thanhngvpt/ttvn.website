<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\IntroduceRepositoryInterface;
use App\Http\Requests\Admin\IntroduceRequest;
use App\Http\Requests\PaginationRequest;

class IntroduceController extends Controller
{
    /** @var  \App\Repositories\IntroduceRepositoryInterface */
    protected $introduceRepository;

    public function __construct(
        IntroduceRepositoryInterface $introduceRepository
    ) {
        $this->introduceRepository = $introduceRepository;
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
        $paginate['baseUrl']    = action('Admin\IntroduceController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->introduceRepository->countByFilter($filter);
        $introduces = $this->introduceRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.introduces.index',
            [
                'introduces'    => $introduces,
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
            'pages.admin.' . config('view.admin') . '.introduces.edit',
            [
                'isNew'     => true,
                'introduce' => $this->introduceRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(IntroduceRequest $request)
    {
        $input = $request->only(
            [
                            'title_introduce',
                            'title_leader_ship',
                            'content_image_id',
                            'mission_image_id',
                            'content',
                            'mission',
                            'content_intro',
                            'overview_intro',
                            'diagram_image_id',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $introduce = $this->introduceRepository->create($input);

        if( empty($introduce) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\IntroduceController@index')
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
        $introduce = $this->introduceRepository->find($id);
        if( empty($introduce) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.introduces.edit',
            [
                'isNew' => false,
                'introduce' => $introduce,
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
    public function update($id, IntroduceRequest $request)
    {
        /** @var  \App\Models\Introduce $introduce */
        $introduce = $this->introduceRepository->find($id);
        if( empty($introduce) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'title_introduce',
                            'title_leader_ship',
                            'content_image_id',
                            'mission_image_id',
                            'content',
                            'mission',
                            'content_intro',
                            'overview_intro',
                            'diagram_image_id',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->introduceRepository->update($introduce, $input);

        return redirect()->action('Admin\IntroduceController@show', [$id])
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
        /** @var  \App\Models\Introduce $introduce */
        $introduce = $this->introduceRepository->find($id);
        if( empty($introduce) ) {
            abort(404);
        }
        $this->introduceRepository->delete($introduce);

        return redirect()->action('Admin\IntroduceController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
