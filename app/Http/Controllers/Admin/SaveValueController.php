<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\SaveValueRepositoryInterface;
use App\Http\Requests\Admin\SaveValueRequest;
use App\Http\Requests\PaginationRequest;

use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class SaveValueController extends Controller
{
    /** @var  \App\Repositories\SaveValueRepositoryInterface */
    protected $saveValueRepository;

     /** @var FileUploadServiceInterface $fileUploadService */
     protected $fileUploadService;

     /** @var ImageRepositoryInterface $imageRepository */
     protected $imageRepository;
 
     /** @var  ImageServiceInterface $imageService */
     protected $imageService;

    public function __construct(
        SaveValueRepositoryInterface $saveValueRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->saveValueRepository = $saveValueRepository;
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
        $paginate['baseUrl']    = action('Admin\SaveValueController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->saveValueRepository->countByFilter($filter);
        $saveValues = $this->saveValueRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.save-values.index',
            [
                'saveValues'    => $saveValues,
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
            'pages.admin.' . config('view.admin') . '.save-values.edit',
            [
                'isNew'     => true,
                'saveValue' => $this->saveValueRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(SaveValueRequest $request)
    {
        $input = $request->only(
            [
                'cover_image_id',
                'value',
                'content',
            ]
        );
        $saveValue = $this->saveValueRepository->create($input);

        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');
            
            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $saveValue->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->saveValueRepository->update($saveValue, ['cover_image_id' => $image->id]);
            }
        }

        if( empty($saveValue) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\SaveValueController@index')
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
        $saveValue = $this->saveValueRepository->find($id);
        if( empty($saveValue) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.save-values.edit',
            [
                'isNew' => false,
                'saveValue' => $saveValue,
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
    public function update($id, SaveValueRequest $request)
    {
        /** @var  \App\Models\SaveValue $saveValue */
        $saveValue = $this->saveValueRepository->find($id);
        if( empty($saveValue) ) {
            abort(404);
        }

        $input = $request->only(
            [
                'cover_image_id',
                'value',
                'content',
            ]
        );
        $saveValue = $this->saveValueRepository->update($saveValue, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $saveValue->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $saveValue->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->saveValueRepository->update($saveValue, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\SaveValueController@show', [$id])
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
        /** @var  \App\Models\SaveValue $saveValue */
        $saveValue = $this->saveValueRepository->find($id);
        if( empty($saveValue) ) {
            abort(404);
        }
        $this->saveValueRepository->delete($saveValue);

        return redirect()->action('Admin\SaveValueController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
