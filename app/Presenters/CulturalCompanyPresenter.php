<?php

namespace App\Presenters;

use Illuminate\Support\Facades\Redis;
use App\Models\Image;
use App\Models\Image;
use App\Models\Image;
use App\Models\Image;

class CulturalCompanyPresenter extends BasePresenter
{
    protected $multilingualFields = [];

    protected $imageFields = ['icon1_image','icon2_image','icon3_image','ttvn_image'];

    /**
    * @return \App\Models\Image
    * */
    public function icon1Image()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->icon1_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->icon1Image;
                Redis::hsetnx($cacheKey, $this->entity->icon1_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->icon1Image;
        return $image;
    }

    /**
    * @return \App\Models\Image
    * */
    public function icon2Image()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->icon2_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->icon2Image;
                Redis::hsetnx($cacheKey, $this->entity->icon2_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->icon2Image;
        return $image;
    }

    /**
    * @return \App\Models\Image
    * */
    public function icon3Image()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->icon3_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->icon3Image;
                Redis::hsetnx($cacheKey, $this->entity->icon3_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->icon3Image;
        return $image;
    }

    /**
    * @return \App\Models\Image
    * */
    public function ttvnImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->ttvn_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->ttvnImage;
                Redis::hsetnx($cacheKey, $this->entity->ttvn_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->ttvnImage;
        return $image;
    }

    
}
