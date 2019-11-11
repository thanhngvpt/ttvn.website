<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\BannerRepositoryInterface;
use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\PaginationRequest;

class BannerController extends Controller
{
    /** @var  \App\Repositories\BannerRepositoryInterface */
    protected $bannerRepository;

    public function __construct(
        BannerRepositoryInterface $bannerRepository
    ) {
        $this->bannerRepository = $bannerRepository;
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
        $paginate['baseUrl']    = action('Admin\BannerController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->bannerRepository->countByFilter($filter);
        $banners = $this->bannerRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.banners.index',
            [
                'banners'    => $banners,
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
            'pages.admin.' . config('view.admin') . '.banners.edit',
            [
                'isNew'     => true,
                'banner' => $this->bannerRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(BannerRequest $request)
    {
        $input = $request->only(
            [
                            'cover_image_id',
                            'title',
                            'description',
                            'admin_user_id',
                            'order',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $banner = $this->bannerRepository->create($input);

        if( empty($banner) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\BannerController@index')
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
        $banner = $this->bannerRepository->find($id);
        if( empty($banner) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.banners.edit',
            [
                'isNew' => false,
                'banner' => $banner,
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
    public function update($id, BannerRequest $request)
    {
        /** @var  \App\Models\Banner $banner */
        $banner = $this->bannerRepository->find($id);
        if( empty($banner) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'cover_image_id',
                            'title',
                            'description',
                            'admin_user_id',
                            'order',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->bannerRepository->update($banner, $input);

        return redirect()->action('Admin\BannerController@show', [$id])
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
        /** @var  \App\Models\Banner $banner */
        $banner = $this->bannerRepository->find($id);
        if( empty($banner) ) {
            abort(404);
        }
        $this->bannerRepository->delete($banner);

        return redirect()->action('Admin\BannerController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
