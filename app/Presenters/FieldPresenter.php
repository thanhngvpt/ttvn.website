<?php

namespace App\Presenters;

use Illuminate\Support\Facades\Redis;
use App\Models\Image;

class FieldPresenter extends BasePresenter
{
    protected $multilingualFields = [];

    protected $imageFields = ['cover_image','icon1_image','icon2_image','icon3_image'];

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

    public function cover2Image()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->cover2_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->coverImage;
                Redis::hsetnx($cacheKey, $this->entity->cover2_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->coverImage;
        return $image;
    }

    public function homeImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->home_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->coverImage;
                Redis::hsetnx($cacheKey, $this->entity->home_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->coverImage;
        return $image;
    }

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

    
}
