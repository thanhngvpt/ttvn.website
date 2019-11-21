<?php namespace Tests\Models;

use App\Models\Banner;
use Tests\TestCase;

class BannerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Banner $banner */
        $banner = new Banner();
        $this->assertNotNull($banner);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Banner $banner */
        $bannerModel = new Banner();

        $bannerData = factory(Banner::class)->make();
        foreach( $bannerData->toFillableArray() as $key => $value ) {
            $bannerModel->$key = $value;
        }
        $bannerModel->save();

        $this->assertNotNull(Banner::find($bannerModel->id));
    }

}
