<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\HeadingRepositoryInterface;
use App\Http\Requests\Admin\HeadingRequest;
use App\Http\Requests\PaginationRequest;

class HeadingController extends Controller
{
    /** @var  \App\Repositories\HeadingRepositoryInterface */
    protected $headingRepository;

    public function __construct(
        HeadingRepositoryInterface $headingRepository
    ) {
        $this->headingRepository = $headingRepository;
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
        $paginate['baseUrl']    = action('Admin\HeadingController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->headingRepository->countByFilter($filter);
        $headings = $this->headingRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.headings.index',
            [
                'headings'    => $headings,
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
            'pages.admin.' . config('view.admin') . '.headings.edit',
            [
                'isNew'     => true,
                'heading' => $this->headingRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(HeadingRequest $request)
    {
        $input = $request->only(
            [
                            'title_heading',
                            'heading_description',
                            'title_group',
                            'title_data_highlight',
                            'title_news',
                            'title_company',
                            'title_support',
                            'support_description',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $heading = $this->headingRepository->create($input);

        if( empty($heading) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\HeadingController@index')
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
        $heading = $this->headingRepository->find($id);
        if( empty($heading) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.headings.edit',
            [
                'isNew' => false,
                'heading' => $heading,
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
    public function update($id, HeadingRequest $request)
    {
        /** @var  \App\Models\Heading $heading */
        $heading = $this->headingRepository->find($id);
        if( empty($heading) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'title_heading',
                            'heading_description',
                            'title_group',
                            'title_data_highlight',
                            'title_news',
                            'title_company',
                            'title_support',
                            'support_description',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->headingRepository->update($heading, $input);

        return redirect()->action('Admin\HeadingController@show', [$id])
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
        /** @var  \App\Models\Heading $heading */
        $heading = $this->headingRepository->find($id);
        if( empty($heading) ) {
            abort(404);
        }
        $this->headingRepository->delete($heading);

        return redirect()->action('Admin\HeadingController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
