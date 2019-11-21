<?php

namespace App\Presenters;

use Illuminate\Support\Facades\Redis;
use App\Models\Image;
use App\Models\NewCategory;

class NewPresenter extends BasePresenter
{
    protected $multilingualFields = [];

    protected $imageFields = ['cover_image'];

    /**
    * @return \App\Models\Image
    * */
    public function coverImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->cover_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->coverImage;
                Redis::hsetnx($cacheKey, $this->entity->cover_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->coverImage;
        return $image;
    }

    /**
    * @return \App\Models\NewCategory
    * */
    public function newCategory()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('NewCategoryModel');
            $cached = Redis::hget($cacheKey, $this->entity->new_category_id);

            if( $cached ) {
                $newCategory = new NewCategory(json_decode($cached, true));
                $newCategory['id'] = json_decode($cached, true)['id'];
                return $newCategory;
            } else {
                $newCategory = $this->entity->newCategory;
                Redis::hsetnx($cacheKey, $this->entity->new_category_id, $newCategory);
                return $newCategory;
            }
        }

        $newCategory = $this->entity->newCategory;
        return $newCategory;
    }

    
}
