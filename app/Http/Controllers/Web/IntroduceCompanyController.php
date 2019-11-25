<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use App\Models\SaveValue;
use App\Models\History;
use App\Models\LeaderShip;

class IntroduceCompanyController extends Controller
{
    public function index()
    {
        $introduce = Introduce::first();
        $save_values = SaveValue::take(12);
        $histories  = History::get();
        $leader_ships = LeaderShip::orderBy('order', 'desc')->get();

        return view('pages.web.introduce-company', [
            'introduce' => $introduce,
            'save_values' => $save_values,
            'histories' => $histories
        ]);
    }
}
