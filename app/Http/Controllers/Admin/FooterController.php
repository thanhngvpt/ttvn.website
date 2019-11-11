<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FooterRepositoryInterface;
use App\Http\Requests\Admin\FooterRequest;
use App\Http\Requests\PaginationRequest;

class FooterController extends Controller
{
    /** @var  \App\Repositories\FooterRepositoryInterface */
    protected $footerRepository;

    public function __construct(
        FooterRepositoryInterface $footerRepository
    ) {
        $this->footerRepository = $footerRepository;
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
        $paginate['baseUrl']    = action('Admin\FooterController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->footerRepository->countByFilter($filter);
        $footers = $this->footerRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.footers.index',
            [
                'footers'    => $footers,
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
            'pages.admin.' . config('view.admin') . '.footers.edit',
            [
                'isNew'     => true,
                'footer' => $this->footerRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(FooterRequest $request)
    {
        $input = $request->only(
            [
                            'hn_name',
                            'hn_address',
                            'hn_phone',
                            'hn_fax',
                            'other_name',
                            'other_address',
                            'other_phone',
                            'other_fax',
                            'fb_link',
                            'skype_link',
                            'email',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $footer = $this->footerRepository->create($input);

        if( empty($footer) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\FooterController@index')
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
        $footer = $this->footerRepository->find($id);
        if( empty($footer) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.footers.edit',
            [
                'isNew' => false,
                'footer' => $footer,
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
    public function update($id, FooterRequest $request)
    {
        /** @var  \App\Models\Footer $footer */
        $footer = $this->footerRepository->find($id);
        if( empty($footer) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'hn_name',
                            'hn_address',
                            'hn_phone',
                            'hn_fax',
                            'other_name',
                            'other_address',
                            'other_phone',
                            'other_fax',
                            'fb_link',
                            'skype_link',
                            'email',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->footerRepository->update($footer, $input);

        return redirect()->action('Admin\FooterController@show', [$id])
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
        /** @var  \App\Models\Footer $footer */
        $footer = $this->footerRepository->find($id);
        if( empty($footer) ) {
            abort(404);
        }
        $this->footerRepository->delete($footer);

        return redirect()->action('Admin\FooterController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
