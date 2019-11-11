<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CompanyRepositoryInterface;
use App\Http\Requests\Admin\CompanyRequest;
use App\Http\Requests\PaginationRequest;

class CompanyController extends Controller
{
    /** @var  \App\Repositories\CompanyRepositoryInterface */
    protected $companyRepository;

    public function __construct(
        CompanyRepositoryInterface $companyRepository
    ) {
        $this->companyRepository = $companyRepository;
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
        $paginate['baseUrl']    = action('Admin\CompanyController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->companyRepository->countByFilter($filter);
        $companies = $this->companyRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.companies.index',
            [
                'companies'    => $companies,
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
            'pages.admin.' . config('view.admin') . '.companies.edit',
            [
                'isNew'     => true,
                'company' => $this->companyRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(CompanyRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'cover_image_id',
                            'link',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $company = $this->companyRepository->create($input);

        if( empty($company) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\CompanyController@index')
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
        $company = $this->companyRepository->find($id);
        if( empty($company) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.companies.edit',
            [
                'isNew' => false,
                'company' => $company,
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
    public function update($id, CompanyRequest $request)
    {
        /** @var  \App\Models\Company $company */
        $company = $this->companyRepository->find($id);
        if( empty($company) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'cover_image_id',
                            'link',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->companyRepository->update($company, $input);

        return redirect()->action('Admin\CompanyController@show', [$id])
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
        /** @var  \App\Models\Company $company */
        $company = $this->companyRepository->find($id);
        if( empty($company) ) {
            abort(404);
        }
        $this->companyRepository->delete($company);

        return redirect()->action('Admin\CompanyController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
