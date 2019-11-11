<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\BannerRepositoryInterface;
use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\PaginationRequest;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;
use App\Services\AdminUserServiceInterface;

class BannerController extends Controller
{
    /** @var  \App\Repositories\BannerRepositoryInterface */
    protected $bannerRepository;
    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;
    protected $adminUserService;

    public function __construct(
        BannerRepositoryInterface $bannerRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService,
        AdminUserServiceInterface $adminUserService
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->fileUploadService        = $fileUploadService;
        $this->imageRepository          = $imageRepository;
        $this->imageService             = $imageService;
        $this->adminUserService = $adminUserService;
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
                'title',
                'description',
                'order',
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $input['admin_user_id'] = $this->adminUserService->getUser()->id;
        $banner = $this->bannerRepository->create($input);
        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $banner->id,
                    'title'       => $request->input('name', ''),
                ]
            );

            if (!empty($image)) {
                $this->bannerRepository->update($banner, ['cover_image_id' => $image->id]);
            }
        }

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
                'title',
                'description',
                'order',
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $input['admin_user_id'] = $this->adminUserService->getUser()->id;
        $banner = $this->bannerRepository->update($banner, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $banner->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $banner->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->bannerRepository->update($banner, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

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
