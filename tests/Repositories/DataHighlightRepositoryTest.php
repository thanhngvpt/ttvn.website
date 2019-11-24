<?php namespace Tests\Repositories;

use App\Models\DataHighLight;
use Tests\TestCase;

class DataHighLightRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\DataHighLightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighLightRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $dataHighLights = factory(DataHighLight::class, 3)->create();
        $dataHighLightIds = $dataHighLights->pluck('id')->toArray();

        /** @var  \App\Repositories\DataHighLightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighLightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighLightsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(DataHighLight::class, $dataHighLightsCheck[0]);

        $dataHighLightsCheck = $repository->getByIds($dataHighLightIds);
        $this->assertEquals(3, count($dataHighLightsCheck));
    }

    public function testFind()
    {
        $dataHighLights = factory(DataHighLight::class, 3)->create();
        $dataHighLightIds = $dataHighLights->pluck('id')->toArray();

        /** @var  \App\Repositories\DataHighLightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighLightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighLightCheck = $repository->find($dataHighLightIds[0]);
        $this->assertEquals($dataHighLightIds[0], $dataHighLightCheck->id);
    }

    public function testCreate()
    {
        $dataHighLightData = factory(DataHighLight::class)->make();

        /** @var  \App\Repositories\DataHighLightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighLightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighLightCheck = $repository->create($dataHighLightData->toFillableArray());
        $this->assertNotNull($dataHighLightCheck);
    }

    public function testUpdate()
    {
        $dataHighLightData = factory(DataHighLight::class)->create();

        /** @var  \App\Repositories\DataHighLightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighLightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $dataHighLightCheck = $repository->update($dataHighLightData, $dataHighLightData->toFillableArray());
        $this->assertNotNull($dataHighLightCheck);
    }

    public function testDelete()
    {
        $dataHighLightData = factory(DataHighLight::class)->create();

        /** @var  \App\Repositories\DataHighLightRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\DataHighLightRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($dataHighLightData);

        $dataHighLightCheck = $repository->find($dataHighLightData->id);
        $this->assertNull($dataHighLightCheck);
    }

}
