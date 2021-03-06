<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PartnerRepositoryInterface;
use App\Http\Requests\Admin\PartnerRequest;
use App\Http\Requests\PaginationRequest;

use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class PartnerController extends Controller
{
    /** @var  \App\Repositories\PartnerRepositoryInterface */
    protected $partnerRepository;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        PartnerRepositoryInterface $partnerRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->partnerRepository = $partnerRepository;
        $this->fileUploadService        = $fileUploadService;
        $this->imageRepository          = $imageRepository;
        $this->imageService             = $imageService;
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
        $paginate['baseUrl']    = action('Admin\PartnerController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->partnerRepository->countByFilter($filter);
        $partners = $this->partnerRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.partners.index',
            [
                'partners'    => $partners,
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
            'pages.admin.' . config('view.admin') . '.partners.edit',
            [
                'isNew'     => true,
                'partner' => $this->partnerRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(PartnerRequest $request)
    {
        $input = $request->only(
            [
                            'cover_image_id',
                            'name',
                            'link',
                            'order'
                        ]
        );
        $partner = $this->partnerRepository->create($input);

        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $partner->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->partnerRepository->update($partner, ['cover_image_id' => $image->id]);
            }
        }

        if( empty($partner) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\PartnerController@index')
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
        $partner = $this->partnerRepository->find($id);
        if( empty($partner) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.partners.edit',
            [
                'isNew' => false,
                'partner' => $partner,
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
    public function update($id, PartnerRequest $request)
    {
        /** @var  \App\Models\Partner $partner */
        $partner = $this->partnerRepository->find($id);
        if( empty($partner) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'cover_image_id',
                            'name',
                            'link',
                            'order'
                        ]
        );
        $partner = $this->partnerRepository->update($partner, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $partner->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $partner->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->partnerRepository->update($partner, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\PartnerController@show', [$id])
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
        /** @var  \App\Models\Partner $partner */
        $partner = $this->partnerRepository->find($id);
        if( empty($partner) ) {
            abort(404);
        }
        $this->partnerRepository->delete($partner);

        return redirect()->action('Admin\PartnerController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
