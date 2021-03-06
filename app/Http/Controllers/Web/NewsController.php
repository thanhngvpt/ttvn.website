<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use \App\Repositories\TableNewRepositoryInterface;
use App\Models\NewCategory;
use App\Models\TableNew;
use App\Models\Footer;
use View;

class NewsController extends Controller
{
    protected $newRepo;
    public function __construct(TableNewRepositoryInterface $newRepo)
    {
        $this->newRepo = $newRepo;
    }
    public function index(PaginationRequest $request, $category_slug)
    {
        if ($category_slug == 'tat-ca') $category_slug = 'all';
        $category_id = 0;
        $categories = NewCategory::orderBy('order', 'asc')->get();
        $page =  $request->get('page', 1);
        $category_active = NewCategory::where('slug', $category_slug)->first();
        
        if ($category_slug != 'all') {
            $category = NewCategory::where('slug', $category_slug)->first();
            $category_id = $category->id;
        }

        if ($category_id != 0) {
            $hot_news = TableNew::where('new_category_id', $category_id)->where('display', 1)->where('is_enabled', 1)->orderBy('order', 'esc')->orderBy('id', 'desc')->take(4)->get();
        } else {
            $hot_news = TableNew::where('is_enabled', 1)->where('display', 1)->orderBy('order', 'esc')->orderBy('id', 'desc')->take(4)->get();
        }
        
        $data = $this->newRepo->getByNewsCategory($page, $category_id);
       
        if($request->ajax()){
            $html = View::make('pages.web.news-next-page', ['data' => $data])->render();

            return $html;
        }

        return view('pages.web.news', [
            'data' => $data,
            'categories' => $categories,
            'hot_news' => $hot_news,
            'category_slug' => $category_slug,
            'category_active' => $category_active,
        ]);
    }

    public function getNewsViaCategory(PaginationRequest $request)
    {
        $page =  $request->get('page', 1);
        $category_id = $request->get('category_id', 0);
        if ($category_id != 0) {
            $hot_news = TableNew::where('new_category_id', $category_id)
                            ->where('is_enabled', 1)
                            ->where('display', 1)
                            ->orderBy('order', 'esc')
                            ->orderBy('id', 'desc')
                            ->take(4)
                            ->get();
        } else {
            $hot_news = TableNew::where('is_enabled', 1)
                                ->where('display', 1)
                                ->orderBy('order', 'esc')
                                ->orderBy('id', 'desc')
                                ->take(4)->get();
        }
       
        
        $data = $this->newRepo->getByNewsCategory($page, $category_id);

        $html = View::make('pages.web.news-next-cate', ['data' => $data, 'hot_news' => $hot_news])->render();

        return $html;
    }

    public function details($category, $slug)
    {
        $news = TableNew::where('slug', $slug)->first();
        $new_relations = TableNew::where('new_category_id', $news->new_category_id)->orderBy('order', 'desc')->take(12)->get();
        $footer = Footer::first();
       
        return view('pages.web.news-detail', [
            'news' => $news,
            'new_relations' => $new_relations,
            'footer' => $footer
        ]); 
    }

    public function all()
    {
        $page = 1;
        $categories = NewCategory::orderBy('order', 'asc')->get();
        $hot_news = TableNew::where('display', 1)->where('is_enabled', 1)->orderBy('order', 'esc')->orderBy('id', 'desc')->take(4)->get();
        $data = $this->newRepo->getByNewsCategory($page, 0);
       
        return view('pages.web.news', [
            'data' => $data,
            'categories' => $categories,
            'hot_news' => $hot_news,
            'category_slug' => 'all'
        ]);
    }
}
