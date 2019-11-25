<?php namespace App\Repositories;

interface TableNewRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    public function getByNewsCategory($page, $category_id);
}
