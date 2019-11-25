<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Video;
use App\Models\Banner;
use App\Models\InforGroup;
use App\Models\DataHighlight;
use App\Models\Company;
use App\Models\NewCategory;
use App\Models\TableNew;
use App\Models\Heading;
use App\Http\Requests\BaseRequest;
use View;

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
        $categories = NewCategory::get();
        $news = TableNew::take(9)->orderBy('id', 'desc')->get();
        $heading = Heading::orderBy('id', 'desc')->first();

        return view('pages.web.home', [
            'fields' => $fields,
            'video' => $video,
            'banners' => $banners,
            'inforGroup' => $inforGroup,
            'dataHighlights' => $dataHighlights,
            'companies' =>  $companies,
            'categories' =>  $categories,
            'news' => $news,
            'heading' => $heading
        ]);
    }

    public function getNewByCate(BaseRequest $request)
    {
        // dd($request->get('cate_id'));
        $cate_id = $request->get('cate_id');
        $news = TableNew::where('new_category_id', $cate_id)->take(9)->orderBy('id', 'desc')->get();
        $html = View::make('pages.web.news-by-category', ['news' => $news])->render();

        return $html;
    }
}
