<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Video;
use App\Models\Banner;
use App\Models\InforGroup;
use App\Models\DataHighlight;
use App\Models\Company;


class HomeController extends Controller
{
    public function index()
    {
        $fields = Field::where('is_enabled', 1)->take(3)->get();
        $video = Video::first();
        $banners = Banner::where('is_enabled', 1)->get();
        $inforGroup = InforGroup::first();
        $dataHighlights = DataHighlight::get();
        $companies = Company::where('is_enabled', 1)->get();
        
        return view('pages.web.home', [
            'fields' => $fields,
            'video' => $video,
            'banners' => $banners,
            'inforGroup' => $inforGroup,
            'dataHighlights' => $dataHighlights,
            'companies' =>  $companies
        ]);
    }
}
