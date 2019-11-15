<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\InforGroupRepositoryInterface;
use App\Http\Requests\Admin\InforGroupRequest;
use App\Http\Requests\PaginationRequest;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class InforGroupController extends Controller
{
    /** @var  \App\Repositories\InforGroupRepositoryInterface */
    protected $inforGroupRepository;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        InforGroupRepositoryInterface $inforGroupRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->inforGroupRepository = $inforGroupRepository;
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
        $paginate['baseUrl']    = action('Admin\InforGroupController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->inforGroupRepository->countByFilter($filter);
        $inforGroups = $this->inforGroupRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.infor-groups.index',
            [
                'inforGroups'    => $inforGroups,
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
            'pages.admin.' . config('view.admin') . '.infor-groups.edit',
            [
                'isNew'     => true,
                'inforGroup' => $this->inforGroupRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(InforGroupRequest $request)
    {
        $input = $request->only(
            [
                'description',
            ]
        );

        $inforGroup = $this->inforGroupRepository->create($input);
        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $inforGroup->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->inforGroupRepository->update($inforGroup, ['cover_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('thumbnail-image')) {
            $file = $request->file('thumbnail-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $inforGroup->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->inforGroupRepository->update($inforGroup, ['thumbnail_image_id' => $image->id]);
            }
        }

        if( empty($inforGroup) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\InforGroupController@index')
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
        $inforGroup = $this->inforGroupRepository->find($id);
        if( empty($inforGroup) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.infor-groups.edit',
            [
                'isNew' => false,
                'inforGroup' => $inforGroup,
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
    public function update($id, InforGroupRequest $request)
    {
        /** @var  \App\Models\InforGroup $inforGroup */
        $inforGroup = $this->inforGroupRepository->find($id);
        if( empty($inforGroup) ) {
            abort(404);
        }

        $input = $request->only(
            [
                'description',
            ]
        );
        $inforGroup = $this->inforGroupRepository->update($inforGroup, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $inforGroup->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $inforGroup->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->inforGroupRepository->update($inforGroup, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        if ($request->hasFile('thumbnail-image')) {
            $currentImage = $inforGroup->thumbnailImage;
            $file = $request->file('thumbnail-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $inforGroup->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->inforGroupRepository->update($inforGroup, ['thumbnail_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\InforGroupController@show', [$id])
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
        /** @var  \App\Models\InforGroup $inforGroup */
        $inforGroup = $this->inforGroupRepository->find($id);
        if( empty($inforGroup) ) {
            abort(404);
        }
        $this->inforGroupRepository->delete($inforGroup);

        return redirect()->action('Admin\InforGroupController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
