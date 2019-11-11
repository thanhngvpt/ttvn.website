<?php

namespace App\Presenters;

use Illuminate\Support\Facades\Redis;
use App\Models\Image;

class CriteriaCandidatePresenter extends BasePresenter
{
    protected $multilingualFields = [];

    protected $imageFields = ['icon_image'];

    /**
    * @return \App\Models\Image
    * */
    public function iconImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->icon_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->iconImage;
                Redis::hsetnx($cacheKey, $this->entity->icon_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->iconImage;
        return $image;
    }

    
}
