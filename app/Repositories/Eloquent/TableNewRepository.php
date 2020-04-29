<?php namespace App\Repositories\Eloquent;

use \App\Repositories\TableNewRepositoryInterface;
use \App\Models\TableNew;

class TableNewRepository extends SingleKeyModelRepository implements TableNewRepositoryInterface
{

    public function getBlankModel()
    {
        return new TableNew();
    }

    public function getByNewsCategory($page, $category_id)
    {
        $page_size = 9;
        $offset = ($page - 1) * $page_size;

        $query = $this->getBlankModel()->where('is_enabled', 1);

        if ($category_id != 0) $query = $query->where('new_category_id', $category_id);
        $count = $query->count();
        $total_page = intval($count / $page_size) + (($count % $page_size) == 0 ? 0 : 1);
        
        $news = $query->orderBy('order', 'desc')->limit($page_size)->offset($offset)->get();

        return [
            'news' => $news,
            'total_page' => $total_page,
            'current_page' => $page
        ];
    }
}
