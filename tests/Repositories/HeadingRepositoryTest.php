<?php namespace Tests\Repositories;

use App\Models\Heading;
use Tests\TestCase;

class HeadingRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\HeadingRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HeadingRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $headings = factory(Heading::class, 3)->create();
        $headingIds = $headings->pluck('id')->toArray();

        /** @var  \App\Repositories\HeadingRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HeadingRepositoryInterface::class);
        $this->assertNotNull($repository);

        $headingsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Heading::class, $headingsCheck[0]);

        $headingsCheck = $repository->getByIds($headingIds);
        $this->assertEquals(3, count($headingsCheck));
    }

    public function testFind()
    {
        $headings = factory(Heading::class, 3)->create();
        $headingIds = $headings->pluck('id')->toArray();

        /** @var  \App\Repositories\HeadingRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HeadingRepositoryInterface::class);
        $this->assertNotNull($repository);

        $headingCheck = $repository->find($headingIds[0]);
        $this->assertEquals($headingIds[0], $headingCheck->id);
    }

    public function testCreate()
    {
        $headingData = factory(Heading::class)->make();

        /** @var  \App\Repositories\HeadingRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HeadingRepositoryInterface::class);
        $this->assertNotNull($repository);

        $headingCheck = $repository->create($headingData->toFillableArray());
        $this->assertNotNull($headingCheck);
    }

    public function testUpdate()
    {
        $headingData = factory(Heading::class)->create();

        /** @var  \App\Repositories\HeadingRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HeadingRepositoryInterface::class);
        $this->assertNotNull($repository);

        $headingCheck = $repository->update($headingData, $headingData->toFillableArray());
        $this->assertNotNull($headingCheck);
    }

    public function testDelete()
    {
        $headingData = factory(Heading::class)->create();

        /** @var  \App\Repositories\HeadingRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HeadingRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($headingData);

        $headingCheck = $repository->find($headingData->id);
        $this->assertNull($headingCheck);
    }

}
