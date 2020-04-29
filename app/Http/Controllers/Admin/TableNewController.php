<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\TableNewRepositoryInterface;
use App\Http\Requests\Admin\TableNewRequest;
use App\Http\Requests\PaginationRequest;
use \App\Repositories\NewCategoryRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Services\ArticleServiceInterface;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;

class TableNewController extends Controller
{
    /** @var  \App\Repositories\TableNewRepositoryInterface */
    protected $tableNewRepository;
    protected $newCategoryRepository;
    protected $articleService;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        TableNewRepositoryInterface $tableNewRepository,
        NewCategoryRepositoryInterface $newCategoryRepository,
        ArticleServiceInterface         $articleService,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->tableNewRepository = $tableNewRepository;
        $this->newCategoryRepository = $newCategoryRepository;
        $this->articleService           = $articleService;
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
        $paginate['baseUrl']    = action('Admin\TableNewController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->tableNewRepository->countByFilter($filter);
        $tableNews = $this->tableNewRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.table-news.index',
            [
                'tableNews'    => $tableNews,
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
            'pages.admin.' . config('view.admin') . '.table-news.edit',
            [
                'isNew'     => true,
                'tableNew' => $this->tableNewRepository->getBlankModel(),
                'categories' => $this->newCategoryRepository->all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(TableNewRequest $request)
    {
        $input = $request->only(
            [
                'name',
                'slug',
                'new_category_id',
                'order',
                'meta_title',
                'meta_description',
                'sapo',
                'content',
                'auth',
                'added_on'
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $input['display'] = $request->get('display', 0);
        $tableNew = $this->tableNewRepository->create($input);

        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'news_cover_image',
                $file,
                [
                    'entity_type' => 'news_cover_image',
                    'entity_id'   => $tableNew->id,
                    'title'       => $request->input('name', ''),
                ]
            );

            if (!empty($image)) {
                $this->tableNewRepository->update($tableNew, ['cover_image_id' => $image->id]);
            }
        }

        if( empty($tableNew) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\TableNewController@index')
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
        $tableNew = $this->tableNewRepository->find($id);
        if( empty($tableNew) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.table-news.edit',
            [
                'isNew' => false,
                'tableNew' => $tableNew,
                'categories' => $this->newCategoryRepository->all()
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
    public function update($id, TableNewRequest $request)
    {
        /** @var  \App\Models\TableNew $tableNew */
        $tableNew = $this->tableNewRepository->find($id);
        if( empty($tableNew) ) {
            abort(404);
        }

        $input = $request->only(
            [
                'name',
                'slug',
                'new_category_id',
                'order',
                'meta_title',
                'meta_description',
                'sapo',
                'content',
                'auth',
                'added_on',
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $input['display'] = $request->get('display', 0);
        $news = $this->tableNewRepository->update($tableNew, $input);

        if ($request->hasFile('cover-image')) {
            $currentImage = $news->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'news_cover_image',
                $file,
                [
                    'entity_type' => 'news_cover_image',
                    'entity_id'   => $news->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->tableNewRepository->update($news, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\TableNewController@show', [$id])
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
        /** @var  \App\Models\TableNew $tableNew */
        $tableNew = $this->tableNewRepository->find($id);
        if( empty($tableNew) ) {
            abort(404);
        }
        $this->tableNewRepository->delete($tableNew);

        return redirect()->action('Admin\TableNewController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

    public function getImages(PaginationRequest $request)
    {
        $entityId = intval($request->input('article_id', 0));
        $type = $request->input('type', 'article_image');

        if ($entityId == 0) {
            $imageIds = $this->articleService->getImageIdsFromSession();
            $models   = $this->imageRepository->allByIds($imageIds);
        } else {
            /** @var \App\Models\Image[] $models */
            $models = $this->imageRepository->allByFileCategoryTypeAndEntityId($type, $entityId);
        }

        $result = [];
        foreach ($models as $model) {
            $result[] = [
                'id'    => $model->id,
                'url'   => $model->present()->url(),
                'thumb' => '',
                'tag'   => ''
            ];
        }

        return response()->json($result);
    }

    public function postImage(BaseRequest $request)
    {
        if (!$request->hasFile('file')) {
            // [TODO] ERROR JSON
            abort(400, 'No Image File');
        }

        $type     = $request->input('type', 'article_image');
        $entityId = $request->input('article_id', 0);

        $conf = config('file.categories.' . $type);
        if (empty($conf)) {
            abort(400, 'Invalid type: ' . $type);
        }

        $file = $request->file('file');

        $image = $this->fileUploadService->upload(
            'article_image',
            $file,
            [
                'entity_type' => $type,
                'entity_id'   => $entityId,
                'title'       => $request->input('title', ''),
            ]
        );


        if ($entityId == 0) {
            $this->articleService->addImageIdToSession($image->id);
        }

        return response()->json(
            [
                'id'   => $image->id,
                'link' => $image->present()->url(),
            ]
        );
    }

    public function deleteImage(BaseRequest $request)
    {
        $url = $request->input('src');
        if (empty($url)) {
            abort(400, 'No URL Given');
        }
        $url = basename($url);

        /** @var \App\Models\Image|null $image */
        $image = $this->imageRepository->findByUrl($url);
        if (empty($image)) {
            abort(404);
        }

        $entityId = $request->input('article_id', 0);
        if ($entityId != $image->entity_id) {
            abort(400, 'Article ID Mismatch');
        } else {
            if ($entityId == 0 && !$this->articleService->hasImageIdInSession($image->id)) {
                abort(400, 'Entity ID Mismatch');
            }
        }

        $this->fileUploadService->delete($image);

        if ($entityId == 0) {
            $this->articleService->removeImageIdFromSession($image->id);
        }

        return response()->json(['status' => 'ok'], 204);
    }
}
