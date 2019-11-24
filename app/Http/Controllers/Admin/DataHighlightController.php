<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\DataHighlightRepositoryInterface;
use App\Http\Requests\Admin\DataHighlightRequest;
use App\Http\Requests\PaginationRequest;

use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class DataHighlightController extends Controller
{
    /** @var  \App\Repositories\DataHighlightRepositoryInterface */
    protected $dataHighlightRepository;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;
    
    public function __construct(
        DataHighlightRepositoryInterface $dataHighlightRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->dataHighlightRepository = $dataHighlightRepository;
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
        $paginate['baseUrl']    = action('Admin\DataHighlightController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->dataHighlightRepository->countByFilter($filter);
        $dataHighlights = $this->dataHighlightRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.data-highlights.index',
            [
                'dataHighlights'    => $dataHighlights,
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
            'pages.admin.' . config('view.admin') . '.data-highlights.edit',
            [
                'isNew'     => true,
                'dataHighlight' => $this->dataHighlightRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(DataHighlightRequest $request)
    {
        $input = $request->only(
            [
                            'cover_image_id',
                            'title',
                            'data',
                        ]
        );

        $dataHighlight = $this->dataHighlightRepository->create($input);
        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $dataHighlight->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->dataHighlightRepository->update($dataHighlight, ['cover_image_id' => $image->id]);
            }
        }
        if( empty($dataHighlight) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\DataHighlightController@index')
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
        $dataHighlight = $this->dataHighlightRepository->find($id);
        if( empty($dataHighlight) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.data-highlights.edit',
            [
                'isNew' => false,
                'dataHighlight' => $dataHighlight,
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
    public function update($id, DataHighlightRequest $request)
    {
        /** @var  \App\Models\DataHighlight $dataHighlight */
        $dataHighlight = $this->dataHighlightRepository->find($id);
        if( empty($dataHighlight) ) {
            abort(404);
        }

        $input = $request->only(
            [
                'cover_image_id',
                'title',
                'data',
            ]
        );
        $dataHighlight = $this->dataHighlightRepository->update($dataHighlight, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $dataHighlight->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $dataHighlight->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->dataHighlightRepository->update($dataHighlight, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\DataHighlightController@show', [$id])
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
        /** @var  \App\Models\DataHighlight $dataHighlight */
        $dataHighlight = $this->dataHighlightRepository->find($id);
        if( empty($dataHighlight) ) {
            abort(404);
        }
        $this->dataHighlightRepository->delete($dataHighlight);

        return redirect()->action('Admin\DataHighlightController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
