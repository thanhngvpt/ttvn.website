<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\DataHighLightRepositoryInterface;
use App\Http\Requests\Admin\DataHighLightRequest;
use App\Http\Requests\PaginationRequest;

use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class DataHighLightController extends Controller
{
    /** @var  \App\Repositories\DataHighLightRepositoryInterface */
    protected $dataHighLightRepository;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        DataHighLightRepositoryInterface $dataHighLightRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->dataHighLightRepository = $dataHighLightRepository;
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
        $paginate['baseUrl']    = action('Admin\DataHighLightController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->dataHighLightRepository->countByFilter($filter);
        $dataHighLights = $this->dataHighLightRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.data-high-lights.index',
            [
                'dataHighLights'    => $dataHighLights,
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
            'pages.admin.' . config('view.admin') . '.data-high-lights.edit',
            [
                'isNew'     => true,
                'dataHighLight' => $this->dataHighLightRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(DataHighLightRequest $request)
    {
        $input = $request->only(
            ['title',
            'data',]
        );

        $dataHighLight = $this->dataHighLightRepository->create($input);
        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $dataHighLight->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->dataHighLightRepository->update($dataHighLight, ['cover_image_id' => $image->id]);
            }
        }
        if( empty($dataHighLight) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\DataHighLightController@index')
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
        $dataHighLight = $this->dataHighLightRepository->find($id);
        if( empty($dataHighLight) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.data-high-lights.edit',
            [
                'isNew' => false,
                'dataHighLight' => $dataHighLight,
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
    public function update($id, DataHighLightRequest $request)
    {
        dd('a');
        /** @var  \App\Models\DataHighLight $dataHighLight */
        $dataHighLight = $this->dataHighLightRepository->find($id);
        if( empty($dataHighLight) ) {
            abort(404);
        }

        $input = $request->only(
            [
            'title',
            'data',]
        );
        $dataHighLight = $this->dataHighLightRepository->update($dataHighLight, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $dataHighLight->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $dataHighLight->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->dataHighLightRepository->update($dataHighLight, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\DataHighLightController@show', [$id])
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
        /** @var  \App\Models\DataHighLight $dataHighLight */
        $dataHighLight = $this->dataHighLightRepository->find($id);
        if( empty($dataHighLight) ) {
            abort(404);
        }
        $this->dataHighLightRepository->delete($dataHighLight);

        return redirect()->action('Admin\DataHighLightController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
