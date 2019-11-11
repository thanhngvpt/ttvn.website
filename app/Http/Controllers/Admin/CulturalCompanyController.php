<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CulturalCompanyRepositoryInterface;
use App\Http\Requests\Admin\CulturalCompanyRequest;
use App\Http\Requests\PaginationRequest;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use App\Http\Requests\BaseRequest;
use App\Repositories\ImageRepositoryInterface;

class CulturalCompanyController extends Controller
{
    /** @var  \App\Repositories\CulturalCompanyRepositoryInterface */
    protected $culturalCompanyRepository;
     /** @var FileUploadServiceInterface $fileUploadService */
     protected $fileUploadService;

     /** @var ImageRepositoryInterface $imageRepository */
     protected $imageRepository;
 
     /** @var  ImageServiceInterface $imageService */
     protected $imageService;

    public function __construct(
        CulturalCompanyRepositoryInterface $culturalCompanyRepository,
        FileUploadServiceInterface      $fileUploadService,
        ImageRepositoryInterface        $imageRepository,
        ImageServiceInterface           $imageService
    ) {
        $this->culturalCompanyRepository = $culturalCompanyRepository;
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
        $paginate['baseUrl']    = action('Admin\CulturalCompanyController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->culturalCompanyRepository->countByFilter($filter);
        $culturalCompanies = $this->culturalCompanyRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.cultural-companies.index',
            [
                'culturalCompanies'    => $culturalCompanies,
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
            'pages.admin.' . config('view.admin') . '.cultural-companies.edit',
            [
                'isNew'     => true,
                'culturalCompany' => $this->culturalCompanyRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(CulturalCompanyRequest $request)
    {
        $input = $request->only(
            [
                'title_page',
                'introduce',
                'content',
                'meta_title',
                'meta_description1',
                'meta_description2',
                'reason1',
                'detail1',
                'reason2',
                'detail2',
                'reason3',
                'detail3',
                'ttvn_title',
                'ttvn_content',
                'we_find_introduce',
            ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $culturalCompany = $this->culturalCompanyRepository->create($input);
        
        if ($request->hasFile('icon1-image')) {
            $file = $request->file('icon1-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $culturalCompany->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->culturalCompanyRepository->update($culturalCompany, ['icon1_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('icon2-image')) {
            $file = $request->file('icon2-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $culturalCompany->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->culturalCompanyRepository->update($culturalCompany, ['icon2_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('icon3-image')) {
            $file = $request->file('icon3-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $culturalCompany->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->culturalCompanyRepository->update($culturalCompany, ['icon3_image_id' => $image->id]);
            }
        }

        if ($request->hasFile('cover-image')) {
            $file = $request->file('cover-image');

            $image = $this->fileUploadService->upload(
                'icon_image',
                $file,
                [
                    'entity_type' => 'icon_image',
                    'entity_id'   => $culturalCompany->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if (!empty($image)) {
                $this->culturalCompanyRepository->update($culturalCompany, ['ttvn_image_id' => $image->id]);
            }
        }



        if( empty($culturalCompany) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\CulturalCompanyController@index')
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
        $culturalCompany = $this->culturalCompanyRepository->find($id);
        if( empty($culturalCompany) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.cultural-companies.edit',
            [
                'isNew' => false,
                'culturalCompany' => $culturalCompany,
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
    public function update($id, CulturalCompanyRequest $request)
    {
        /** @var  \App\Models\CulturalCompany $culturalCompany */
        $culturalCompany = $this->culturalCompanyRepository->find($id);
        if( empty($culturalCompany) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'title_page',
                            'introduce',
                            'content',
                            'meta_title',
                            'meta_description1',
                            'meta_description2',
                            'icon1_image_id',
                            'reason1',
                            'detail1',
                            'icon2_image_id',
                            'reason2',
                            'detail2',
                            'icon3_image_id',
                            'reason3',
                            'detail3',
                            'ttvn_image_id',
                            'ttvn_title',
                            'ttvn_content',
                            'we_find_introduce',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->culturalCompanyRepository->update($culturalCompany, $input);

        return redirect()->action('Admin\CulturalCompanyController@show', [$id])
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
        /** @var  \App\Models\CulturalCompany $culturalCompany */
        $culturalCompany = $this->culturalCompanyRepository->find($id);
        if( empty($culturalCompany) ) {
            abort(404);
        }
        $this->culturalCompanyRepository->delete($culturalCompany);

        return redirect()->action('Admin\CulturalCompanyController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
