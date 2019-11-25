<?php namespace Tests\Models;

use App\Models\Footer;
use Tests\TestCase;

class FooterTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Footer $footer */
        $footer = new Footer();
        $this->assertNotNull($footer);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Footer $footer */
        $footerModel = new Footer();

        $footerData = factory(Footer::class)->make();
        foreach( $footerData->toFillableArray() as $key => $value ) {
            $footerModel->$key = $value;
        }
        $footerModel->save();

        $this->assertNotNull(Footer::find($footerModel->id));
    }

}
