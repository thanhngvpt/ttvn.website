<?php namespace Tests\Repositories;

use App\Models\NewCategory;
use Tests\TestCase;

class NewCategoryRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\NewCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\NewCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $newCategories = factory(NewCategory::class, 3)->create();
        $newCategoryIds = $newCategories->pluck('id')->toArray();

        /** @var  \App\Repositories\NewCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\NewCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $newCategoriesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(NewCategory::class, $newCategoriesCheck[0]);

        $newCategoriesCheck = $repository->getByIds($newCategoryIds);
        $this->assertEquals(3, count($newCategoriesCheck));
    }

    public function testFind()
    {
        $newCategories = factory(NewCategory::class, 3)->create();
        $newCategoryIds = $newCategories->pluck('id')->toArray();

        /** @var  \App\Repositories\NewCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\NewCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $newCategoryCheck = $repository->find($newCategoryIds[0]);
        $this->assertEquals($newCategoryIds[0], $newCategoryCheck->id);
    }

    public function testCreate()
    {
        $newCategoryData = factory(NewCategory::class)->make();

        /** @var  \App\Repositories\NewCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\NewCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $newCategoryCheck = $repository->create($newCategoryData->toFillableArray());
        $this->assertNotNull($newCategoryCheck);
    }

    public function testUpdate()
    {
        $newCategoryData = factory(NewCategory::class)->create();

        /** @var  \App\Repositories\NewCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\NewCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $newCategoryCheck = $repository->update($newCategoryData, $newCategoryData->toFillableArray());
        $this->assertNotNull($newCategoryCheck);
    }

    public function testDelete()
    {
        $newCategoryData = factory(NewCategory::class)->create();

        /** @var  \App\Repositories\NewCategoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\NewCategoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($newCategoryData);

        $newCategoryCheck = $repository->find($newCategoryData->id);
        $this->assertNull($newCategoryCheck);
    }

}
