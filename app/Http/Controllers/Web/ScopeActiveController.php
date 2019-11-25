<?php

namespace App\Http\Controllers\Web;

use App\Models\Field;
use App\Models\Project;
use App\Http\Controllers\Controller;

class ScopeActiveController extends Controller
{
    public function index()
    {
        $fields = Field::where('is_enabled', 1)->take(3)->orderBy('order', 'asc')->get();
        $projects = Project::take(9)->orderBy('order', 'asc')->get();
        return view('pages.web.scope-active', [
            'fields' => $fields,
            'projects' => $projects,
        ]);
    }
}
