<?php

namespace App\Presenters;

use Illuminate\Support\Facades\Redis;
use App\Models\Image;

class IntroducePresenter extends BasePresenter
{
    protected $multilingualFields = [];

    protected $imageFields = ['content_image','mission_image','diagram_image'];

    /**
    * @return \App\Models\Image
    * */
    public function contentImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->content_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->contentImage;
                Redis::hsetnx($cacheKey, $this->entity->content_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->contentImage;
        return $image;
    }

    /**
    * @return \App\Models\Image
    * */
    public function missionImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->mission_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->missionImage;
                Redis::hsetnx($cacheKey, $this->entity->mission_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->missionImage;
        return $image;
    }

    /**
    * @return \App\Models\Image
    * */
    public function diagramImage()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('ImageModel');
            $cached = Redis::hget($cacheKey, $this->entity->diagram_image_id);

            if( $cached ) {
                $image = new Image(json_decode($cached, true));
                $image['id'] = json_decode($cached, true)['id'];
                return $image;
            } else {
                $image = $this->entity->diagramImage;
                Redis::hsetnx($cacheKey, $this->entity->diagram_image_id, $image);
                return $image;
            }
        }

        $image = $this->entity->diagramImage;
        return $image;
    }

    
}
