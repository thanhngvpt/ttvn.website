<?php namespace Tests\Repositories;

use App\Models\DataHighlight;
use Tests\TestCase;

class DataHighlightRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\DataHighlightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighlightRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $dataHighlights = factory(DataHighlight::class, 3)->create();
        $dataHighlightIds = $dataHighlights->pluck('id')->toArray();

        /** @var  \App\Repositories\DataHighlightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighlightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighlightsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(DataHighlight::class, $dataHighlightsCheck[0]);

        $dataHighlightsCheck = $repository->getByIds($dataHighlightIds);
        $this->assertEquals(3, count($dataHighlightsCheck));
    }

    public function testFind()
    {
        $dataHighlights = factory(DataHighlight::class, 3)->create();
        $dataHighlightIds = $dataHighlights->pluck('id')->toArray();

        /** @var  \App\Repositories\DataHighlightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighlightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighlightCheck = $repository->find($dataHighlightIds[0]);
        $this->assertEquals($dataHighlightIds[0], $dataHighlightCheck->id);
    }

    public function testCreate()
    {
        $dataHighlightData = factory(DataHighlight::class)->make();

        /** @var  \App\Repositories\DataHighlightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighlightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighlightCheck = $repository->create($dataHighlightData->toFillableArray());
        $this->assertNotNull($dataHighlightCheck);
    }

    public function testUpdate()
    {
        $dataHighlightData = factory(DataHighlight::class)->create();

        /** @var  \App\Repositories\DataHighlightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighlightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighlightCheck = $repository->update($dataHighlightData, $dataHighlightData->toFillableArray());
        $this->assertNotNull($dataHighlightCheck);
    }

    public function testDelete()
    {
        $dataHighlightData = factory(DataHighlight::class)->create();

        /** @var  \App\Repositories\DataHighlightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighlightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($dataHighlightData);

        $dataHighlightCheck = $repository->find($dataHighlightData->id);
        $this->assertNull($dataHighlightCheck);
    }

}
