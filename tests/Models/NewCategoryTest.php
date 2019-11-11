<?php namespace Tests\Models;

use App\Models\NewCategory;
use Tests\TestCase;

class NewCategoryTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\NewCategory $newCategory */
        $newCategory = new NewCategory();
        $this->assertNotNull($newCategory);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\NewCategory $newCategory */
        $newCategoryModel = new NewCategory();

        $newCategoryData = factory(NewCategory::class)->make();
        foreach( $newCategoryData->toFillableArray() as $key => $value ) {
            $newCategoryModel->$key = $value;
        }
        $newCategoryModel->save();

        $this->assertNotNull(NewCategory::find($newCategoryModel->id));
    }

}
