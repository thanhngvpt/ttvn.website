<?php namespace Tests\Models;

use App\Models\Field;
use Tests\TestCase;

class FieldTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Field $field */
        $field = new Field();
        $this->assertNotNull($field);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Field $field */
        $fieldModel = new Field();

        $fieldData = factory(Field::class)->make();
        foreach( $fieldData->toFillableArray() as $key => $value ) {
            $fieldModel->$key = $value;
        }
        $fieldModel->save();

        $this->assertNotNull(Field::find($fieldModel->id));
    }

}
