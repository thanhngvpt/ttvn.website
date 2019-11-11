<?php namespace Tests\Repositories;

use App\Models\Video;
use Tests\TestCase;

class VideoRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\VideoRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\VideoRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $videos = factory(Video::class, 3)->create();
        $videoIds = $videos->pluck('id')->toArray();

        /** @var  \App\Repositories\VideoRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\VideoRepositoryInterface::class);
        $this->assertNotNull($repository);

        $videosCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Video::class, $videosCheck[0]);

        $videosCheck = $repository->getByIds($videoIds);
        $this->assertEquals(3, count($videosCheck));
    }

    public function testFind()
    {
        $videos = factory(Video::class, 3)->create();
        $videoIds = $videos->pluck('id')->toArray();

        /** @var  \App\Repositories\VideoRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\VideoRepositoryInterface::class);
        $this->assertNotNull($repository);

        $videoCheck = $repository->find($videoIds[0]);
        $this->assertEquals($videoIds[0], $videoCheck->id);
    }

    public function testCreate()
    {
        $videoData = factory(Video::class)->make();

        /** @var  \App\Repositories\VideoRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\VideoRepositoryInterface::class);
        $this->assertNotNull($repository);

        $videoCheck = $repository->create($videoData->toFillableArray());
        $this->assertNotNull($videoCheck);
    }

    public function testUpdate()
    {
        $videoData = factory(Video::class)->create();

        /** @var  \App\Repositories\VideoRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\VideoRepositoryInterface::class);
        $this->assertNotNull($repository);

        $videoCheck = $repository->update($videoData, $videoData->toFillableArray());
        $this->assertNotNull($videoCheck);
    }

    public function testDelete()
    {
        $videoData = factory(Video::class)->create();

        /** @var  \App\Repositories\VideoRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\VideoRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($videoData);

        $videoCheck = $repository->find($videoData->id);
        $this->assertNull($videoCheck);
    }

}
