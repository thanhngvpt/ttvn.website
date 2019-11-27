<?php

namespace App\Http\Controllers\Web;

use App\Models\Field;
use App\Models\Project;
use App\Http\Controllers\Controller;
use View;
use App\Http\Requests\PaginationRequest;

class ScopeActiveController extends Controller
{
    public function index($slug)
    {
        $fields = Field::where('is_enabled', 1)->take(3)->orderBy('order', 'asc')->get();
        $projects = Project::where('field_id', $fields[0]->id)->take(9)->orderBy('order', 'asc')->get();
        return view('pages.web.scope-active', [
            'fields' => $fields,
            'projects' => $projects,
            'slug' => $slug
        ]);
    }

    public function getProjects(PaginationRequest $request)
    {
        $field_id = $request->get('field_id');
        $projects = Project::where('field_id', $field_id)->take(9)->orderBy('order', 'asc')->get();

        return $html = View::make('pages.web.project-field', ['projects' => $projects])->render();
    }
}
