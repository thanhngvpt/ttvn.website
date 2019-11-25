<?php namespace Tests\Repositories;

use App\Models\SaveValue;
use Tests\TestCase;

class SaveValueRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\SaveValueRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\SaveValueRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $saveValues = factory(SaveValue::class, 3)->create();
        $saveValueIds = $saveValues->pluck('id')->toArray();

        /** @var  \App\Repositories\SaveValueRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\SaveValueRepositoryInterface::class);
        $this->assertNotNull($repository);

        $saveValuesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(SaveValue::class, $saveValuesCheck[0]);

        $saveValuesCheck = $repository->getByIds($saveValueIds);
        $this->assertEquals(3, count($saveValuesCheck));
    }

    public function testFind()
    {
        $saveValues = factory(SaveValue::class, 3)->create();
        $saveValueIds = $saveValues->pluck('id')->toArray();

        /** @var  \App\Repositories\SaveValueRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\SaveValueRepositoryInterface::class);
        $this->assertNotNull($repository);

        $saveValueCheck = $repository->find($saveValueIds[0]);
        $this->assertEquals($saveValueIds[0], $saveValueCheck->id);
    }

    public function testCreate()
    {
        $saveValueData = factory(SaveValue::class)->make();

        /** @var  \App\Repositories\SaveValueRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\SaveValueRepositoryInterface::class);
        $this->assertNotNull($repository);

        $saveValueCheck = $repository->create($saveValueData->toFillableArray());
        $this->assertNotNull($saveValueCheck);
    }

    public function testUpdate()
    {
        $saveValueData = factory(SaveValue::class)->create();

        /** @var  \App\Repositories\SaveValueRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\SaveValueRepositoryInterface::class);
        $this->assertNotNull($repository);

        $saveValueCheck = $repository->update($saveValueData, $saveValueData->toFillableArray());
        $this->assertNotNull($saveValueCheck);
    }

    public function testDelete()
    {
        $saveValueData = factory(SaveValue::class)->create();

        /** @var  \App\Repositories\SaveValueRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\SaveValueRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($saveValueData);

        $saveValueCheck = $repository->find($saveValueData->id);
        $this->assertNull($saveValueCheck);
    }

}
