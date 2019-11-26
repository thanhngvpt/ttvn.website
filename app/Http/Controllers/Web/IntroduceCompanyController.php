<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use App\Models\SaveValue;
use App\Models\History;
use App\Models\LeaderShip;
use App\Models\Partner;

class IntroduceCompanyController extends Controller
{
    /** 
     * type = 1 => tab TTVN
     * type = 2 => tab BLD
    */
    public function index()
    {
        $introduce = Introduce::first();
        $save_values = SaveValue::take(12)->get();
        $histories  = History::get();
        $leader_ships = LeaderShip::orderBy('order', 'desc')->get();
        $partners = Partner::orderBy('id', 'desc')->get();

        return view('pages.web.introduce-company', [
            'introduce' => $introduce,
            'save_values' => $save_values,
            'histories' => $histories,
            'leader_ships' => $leader_ships,
            'partners' => $partners,
            // 'type' => $type
        ]);
    }
}
