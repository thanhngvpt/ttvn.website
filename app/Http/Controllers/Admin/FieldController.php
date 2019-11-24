<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FieldRepositoryInterface;
use App\Http\Requests\Admin\FieldRequest;
use App\Http\Requests\PaginationRequest;


use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class FieldController extends Controller
{
    /** @var  \App\Repositories\FieldRepositoryInterface */
    protected $fieldRepository;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    public function __construct(
        FieldRepositoryInterface $fieldRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->fieldRepository = $fieldRepository;
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
        $paginate['baseUrl']    = action('Admin\FieldController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->fieldRepository->countByFilter($filter);
        $fields = $this->fieldRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.fields.index',
            [
                'fields'    => $fields,
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
            'pages.admin.' . config('view.admin') . '.fields.edit',
            [
                'isNew'     => true,
                'field' => $this->fieldRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(FieldRequest $request)
    {
        $input = $request->only(
            [
                'name',
                'slug',
                'meta_title',
                'meta_description',
                'title',
                'content',
                'charact_1',
                'des_1',
                'charact_2',
                'des_2',
                'charact_3',
                'des_3',
                'order',
                'is_enabled',
                'home_content'
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $field = $this->fieldRepository->create($input);

        if ($request->hasFile('icon1-image')) {
            $file = $request->file('icon1-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->fieldRepository->update($field, ['icon1_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('icon2-image')) {
            $file = $request->file('icon2-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->fieldRepository->update($field, ['icon2_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('icon3-image')) {
            $file = $request->file('icon3-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->fieldRepository->update($field, ['icon3_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->fieldRepository->update($field, ['cover_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('cover2-image')) {
            $file = $request->file('cover2-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->fieldRepository->update($field, ['cover2_image_id' => $image->id]);
            }
        }

        if( empty($field) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\FieldController@index')
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
        $field = $this->fieldRepository->find($id);
        if( empty($field) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.fields.edit',
            [
                'isNew' => false,
                'field' => $field,
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
    public function update($id, FieldRequest $request)
    {
        /** @var  \App\Models\Field $field */
        $field = $this->fieldRepository->find($id);
        if( empty($field) ) {
            abort(404);
        }

        $input = $request->only(
            [
                'name',
                'slug',
                'meta_title',
                'meta_description',
                'cover_image_id',
                'title',
                'content',
                'icon1_image_id',
                'charact_1',
                'des_1',
                'icon2_image_id',
                'charact_2',
                'des_2',
                'icon3_image_id',
                'charact_3',
                'des_3',
                'order',
                'is_enabled',
                'home_content'
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $field = $this->fieldRepository->update($field, $input);

        if ($request->hasFile('icon1-image')) {
            $currentImage = $field->icon1Image;
            $file = $request->file('icon1-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->fieldRepository->update($field, ['icon1_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        if ($request->hasFile('icon2-image')) {
            $currentImage = $field->icon2Image;
            $file = $request->file('icon2-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->fieldRepository->update($field, ['icon2_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        if ($request->hasFile('icon3-image')) {
            $currentImage = $field->icon3Image;
            $file = $request->file('icon3-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->fieldRepository->update($field, ['icon3_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        if ($request->hasFile('cover-image')) {
            $currentImage = $field->coverImage;
            $file = $request->file('cover-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->fieldRepository->update($field, ['cover_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        if ($request->hasFile('cover2-image')) {
            $currentImage = $field->cover2Image;
            $file = $request->file('cover2-image');

            $newImage = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $field->id,
                    'title'       => $request->input('title', ''),
                ]
            );

            if (!empty($newImage)) {
                $this->fieldRepository->update($field, ['cover2_image_id' => $newImage->id]);

                if (!empty($currentImage)) {
                    $this->fileUploadService->delete($currentImage);
                }
            }
        }

        return redirect()->action('Admin\FieldController@show', [$id])
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
        /** @var  \App\Models\Field $field */
        $field = $this->fieldRepository->find($id);
        if( empty($field) ) {
            abort(404);
        }
        $this->fieldRepository->delete($field);

        return redirect()->action('Admin\FieldController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
