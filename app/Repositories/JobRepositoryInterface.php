<?php namespace App\Repositories;

interface JobRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    public function getByJobCategory($page,$category_id, $province, $keyword);
}