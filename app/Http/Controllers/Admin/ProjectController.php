<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProjectRepositoryInterface;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Requests\PaginationRequest;

use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class ProjectController extends Controller
{
    /** @var  \App\Repositories\ProjectRepositoryInterface */
    protected $projectRepository;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        ProjectRepositoryInterface $projectRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->projectRepository = $projectRepository;
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
        $paginate['baseUrl']    = action('Admin\ProjectController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->projectRepository->countByFilter($filter);
        $projects = $this->projectRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.projects.index',
            [
                'projects'    => $projects,
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
            'pages.admin.' . config('view.admin') . '.projects.edit',
            [
                'isNew'     => true,
                'project' => $this->projectRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(ProjectRequest $request)
    {
        $input = $request->only(
            [
                            'cover_image_id',
                            'name',
                            'address',
                            'link',
                            'order',
                        ]
        );
        $project = $this->projectRepository->create($input);

        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $project->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->projectRepository->update($project, ['cover_image_id' => $image->id]);
            }
        }

        if( empty($project) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\ProjectController@index')
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
        $project = $this->projectRepository->find($id);
        if( empty($project) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.projects.edit',
            [
                'isNew' => false,
                'project' => $project,
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
    public function update($id, ProjectRequest $request)
    {
        /** @var  \App\Models\Project $project */
        $project = $this->projectRepository->find($id);
        if( empty($project) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'cover_image_id',
                            'name',
                            'address',
                            'link',
                            'order',
                        ]
        );
        $project = $this->projectRepository->update($project, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $project->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'banner_cover_image',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $project->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->projectRepository->update($project, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\ProjectController@show', [$id])
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
        /** @var  \App\Models\Project $project */
        $project = $this->projectRepository->find($id);
        if( empty($project) ) {
            abort(404);
        }
        $this->projectRepository->delete($project);

        return redirect()->action('Admin\ProjectController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
