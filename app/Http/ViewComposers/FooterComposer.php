<?php

namespace App\Http\ViewComposers;

use App\Models\Footer;
use Illuminate\View\View;

class FooterComposer
{
    protected $footerHQs;

    public function __construct()
    {
        $this->footerHQs = $this->getData();
    }

    protected function getData () {
        $records = Footer::orderBy('order')->get();

        return $records;
    }

    public function compose(View $view) {
        $view->with('footerHQs', $this->footerHQs);
    }
}