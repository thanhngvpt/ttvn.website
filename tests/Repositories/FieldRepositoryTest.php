<?php namespace Tests\Repositories;

use App\Models\Field;
use Tests\TestCase;

class FieldRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\FieldRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FieldRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $fields = factory(Field::class, 3)->create();
        $fieldIds = $fields->pluck('id')->toArray();

        /** @var  \App\Repositories\FieldRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FieldRepositoryInterface::class);
        $this->assertNotNull($repository);

        $fieldsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Field::class, $fieldsCheck[0]);

        $fieldsCheck = $repository->getByIds($fieldIds);
        $this->assertEquals(3, count($fieldsCheck));
    }

    public function testFind()
    {
        $fields = factory(Field::class, 3)->create();
        $fieldIds = $fields->pluck('id')->toArray();

        /** @var  \App\Repositories\FieldRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FieldRepositoryInterface::class);
        $this->assertNotNull($repository);

        $fieldCheck = $repository->find($fieldIds[0]);
        $this->assertEquals($fieldIds[0], $fieldCheck->id);
    }

    public function testCreate()
    {
        $fieldData = factory(Field::class)->make();

        /** @var  \App\Repositories\FieldRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FieldRepositoryInterface::class);
        $this->assertNotNull($repository);

        $fieldCheck = $repository->create($fieldData->toFillableArray());
        $this->assertNotNull($fieldCheck);
    }

    public function testUpdate()
    {
        $fieldData = factory(Field::class)->create();

        /** @var  \App\Repositories\FieldRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FieldRepositoryInterface::class);
        $this->assertNotNull($repository);

        $fieldCheck = $repository->update($fieldData, $fieldData->toFillableArray());
        $this->assertNotNull($fieldCheck);
    }

    public function testDelete()
    {
        $fieldData = factory(Field::class)->create();

        /** @var  \App\Repositories\FieldRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FieldRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($fieldData);

        $fieldCheck = $repository->find($fieldData->id);
        $this->assertNull($fieldCheck);
    }

}
