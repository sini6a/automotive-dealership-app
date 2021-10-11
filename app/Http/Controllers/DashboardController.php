<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellVehicle;
use App\Vehicle;

class DashboardController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

	public function index() {
        $sell_vehicle = SellVehicle::orderBy('id', 'desc')->take(5)->get();
        //$sell_vehicle = $sell_vehicle->reverse();
        $vehicles_for_sale = Vehicle::where('sold', 0)->orderBy('id', 'desc')->take(5)->get();
        $sold_vehicles = Vehicle::where('sold', 1)->orderBy('id', 'desc')->take(5)->get();

        return view('dashboard', compact('sell_vehicle', 'vehicles_for_sale', 'sold_vehicles'));
	}
}
