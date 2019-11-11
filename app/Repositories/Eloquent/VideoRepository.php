<?php namespace App\Repositories\Eloquent;

use \App\Repositories\VideoRepositoryInterface;
use \App\Models\Video;

class VideoRepository extends SingleKeyModelRepository implements VideoRepositoryInterface
{

    public function getBlankModel()
    {
        return new Video();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
