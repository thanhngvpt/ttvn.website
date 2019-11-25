<?php namespace Tests\Models;

use App\Models\Video;
use Tests\TestCase;

class VideoTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Video $video */
        $video = new Video();
        $this->assertNotNull($video);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Video $video */
        $videoModel = new Video();

        $videoData = factory(Video::class)->make();
        foreach( $videoData->toFillableArray() as $key => $value ) {
            $videoModel->$key = $value;
        }
        $videoModel->save();

        $this->assertNotNull(Video::find($videoModel->id));
    }

}
