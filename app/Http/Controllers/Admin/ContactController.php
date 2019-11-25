<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ContactRepositoryInterface;
use App\Http\Requests\Admin\ContactRequest;
use App\Http\Requests\PaginationRequest;

class ContactController extends Controller
{
    /** @var  \App\Repositories\ContactRepositoryInterface */
    protected $contactRepository;

    public function __construct(
        ContactRepositoryInterface $contactRepository
    ) {
        $this->contactRepository = $contactRepository;
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
        $paginate['baseUrl']    = action('Admin\ContactController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->contactRepository->countByFilter($filter);
        $contacts = $this->contactRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.contacts.index',
            [
                'contacts'    => $contacts,
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
            'pages.admin.' . config('view.admin') . '.contacts.edit',
            [
                'isNew'     => true,
                'contact' => $this->contactRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(ContactRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'email',
                            'phone',
                            'content',
                            'message_type',
                            'is_read',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $contact = $this->contactRepository->create($input);

        if( empty($contact) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\ContactController@index')
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
        $contact = $this->contactRepository->find($id);
        if( empty($contact) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.contacts.edit',
            [
                'isNew' => false,
                'contact' => $contact,
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
    public function update($id, ContactRequest $request)
    {
        /** @var  \App\Models\Contact $contact */
        $contact = $this->contactRepository->find($id);
        if( empty($contact) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'email',
                            'phone',
                            'content',
                            'message_type',
                            'is_read',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->contactRepository->update($contact, $input);

        return redirect()->action('Admin\ContactController@show', [$id])
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
        /** @var  \App\Models\Contact $contact */
        $contact = $this->contactRepository->find($id);
        if( empty($contact) ) {
            abort(404);
        }
        $this->contactRepository->delete($contact);

        return redirect()->action('Admin\ContactController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
