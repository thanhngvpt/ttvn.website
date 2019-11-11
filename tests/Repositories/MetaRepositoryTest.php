<?php namespace Tests\Repositories;

use App\Models\Meta;
use Tests\TestCase;

class MetaRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\MetaRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\MetaRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $meta = factory(Meta::class, 3)->create();
        $metaIds = $meta->pluck('id')->toArray();

        /** @var  \App\Repositories\MetaRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\MetaRepositoryInterface::class);
        $this->assertNotNull($repository);

        $metaCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Meta::class, $metaCheck[0]);

        $metaCheck = $repository->getByIds($metaIds);
        $this->assertEquals(3, count($metaCheck));
    }

    public function testFind()
    {
        $meta = factory(Meta::class, 3)->create();
        $metaIds = $meta->pluck('id')->toArray();

        /** @var  \App\Repositories\MetaRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\MetaRepositoryInterface::class);
        $this->assertNotNull($repository);

        $metaCheck = $repository->find($metaIds[0]);
        $this->assertEquals($metaIds[0], $metaCheck->id);
    }

    public function testCreate()
    {
        $metaData = factory(Meta::class)->make();

        /** @var  \App\Repositories\MetaRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\MetaRepositoryInterface::class);
        $this->assertNotNull($repository);

        $metaCheck = $repository->create($metaData->toFillableArray());
        $this->assertNotNull($metaCheck);
    }

    public function testUpdate()
    {
        $metaData = factory(Meta::class)->create();

        /** @var  \App\Repositories\MetaRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\MetaRepositoryInterface::class);
        $this->assertNotNull($repository);

        $metaCheck = $repository->update($metaData, $metaData->toFillableArray());
        $this->assertNotNull($metaCheck);
    }

    public function testDelete()
    {
        $metaData = factory(Meta::class)->create();

        /** @var  \App\Repositories\MetaRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\MetaRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($metaData);

        $metaCheck = $repository->find($metaData->id);
        $this->assertNull($metaCheck);
    }

}
