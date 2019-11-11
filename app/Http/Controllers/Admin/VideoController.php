<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\VideoRepositoryInterface;
use App\Http\Requests\Admin\VideoRequest;
use App\Http\Requests\PaginationRequest;

class VideoController extends Controller
{
    /** @var  \App\Repositories\VideoRepositoryInterface */
    protected $videoRepository;

    public function __construct(
        VideoRepositoryInterface $videoRepository
    ) {
        $this->videoRepository = $videoRepository;
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
                            'cover_image_id',
                            'video_url',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $video = $this->videoRepository->create($input);

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
                            'cover_image_id',
                            'video_url',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->videoRepository->update($video, $input);

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
