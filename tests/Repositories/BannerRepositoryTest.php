<?php namespace Tests\Repositories;

use App\Models\Banner;
use Tests\TestCase;

class BannerRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\BannerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BannerRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $banners = factory(Banner::class, 3)->create();
        $bannerIds = $banners->pluck('id')->toArray();

        /** @var  \App\Repositories\BannerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BannerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $bannersCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Banner::class, $bannersCheck[0]);

        $bannersCheck = $repository->getByIds($bannerIds);
        $this->assertEquals(3, count($bannersCheck));
    }

    public function testFind()
    {
        $banners = factory(Banner::class, 3)->create();
        $bannerIds = $banners->pluck('id')->toArray();

        /** @var  \App\Repositories\BannerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BannerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $bannerCheck = $repository->find($bannerIds[0]);
        $this->assertEquals($bannerIds[0], $bannerCheck->id);
    }

    public function testCreate()
    {
        $bannerData = factory(Banner::class)->make();

        /** @var  \App\Repositories\BannerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BannerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $bannerCheck = $repository->create($bannerData->toFillableArray());
        $this->assertNotNull($bannerCheck);
    }

    public function testUpdate()
    {
        $bannerData = factory(Banner::class)->create();

        /** @var  \App\Repositories\BannerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BannerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $bannerCheck = $repository->update($bannerData, $bannerData->toFillableArray());
        $this->assertNotNull($bannerCheck);
    }

    public function testDelete()
    {
        $bannerData = factory(Banner::class)->create();

        /** @var  \App\Repositories\BannerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\BannerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($bannerData);

        $bannerCheck = $repository->find($bannerData->id);
        $this->assertNull($bannerCheck);
    }

}
