<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\VideoRepositoryInterface;
use App\Http\Requests\Admin\VideoRequest;
use App\Http\Requests\PaginationRequest;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class VideoController extends Controller
{
    /** @var  \App\Repositories\VideoRepositoryInterface */
    protected $videoRepository;
    
    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        VideoRepositoryInterface $videoRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->videoRepository = $videoRepository;
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
        $paginate['baseUrl']    = action('Admin\VideoController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->videoRepository->countByFilter($filter);
        $videos = $this->videoRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.videos.index',
            [
                'videos'    => $videos,
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
            'pages.admin.' . config('view.admin') . '.videos.edit',
            [
                'isNew'     => true,
                'video' => $this->videoRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(VideoRequest $request)
    {
        $input = $request->only(
            [
                'video_url',
            ]
        );

        $video = $this->videoRepository->create($input);
        
        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $video->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->videoRepository->update($video, ['cover_image_id' => $image->id]);
            }
        }

        if( empty($video) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\VideoController@index')
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
        $video = $this->videoRepository->find($id);
        if( empty($video) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.videos.edit',
            [
                'isNew' => false,
                'video' => $video,
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
    public function update($id, VideoRequest $request)
    {
        /** @var  \App\Models\Video $video */
        $video = $this->videoRepository->find($id);
        if( empty($video) ) {
            abort(404);
        }

        $input = $request->only(
            [
                'video_url',
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $video = $this->videoRepository->update($video, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $video->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $video->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->videoRepository->update($video, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\VideoController@show', [$id])
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
        /** @var  \App\Models\Video $video */
        $video = $this->videoRepository->find($id);
        if( empty($video) ) {
            abort(404);
        }
        $this->videoRepository->delete($video);

        return redirect()->action('Admin\VideoController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
