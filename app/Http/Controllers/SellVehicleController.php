<?php

namespace App\Http\Controllers;

use App\SellVehicle;
use Illuminate\Http\Request;

class SellVehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store',]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell_vehicles = SellVehicle::orderBy('id', 'desc')->paginate(10);

        return view('sellvehicle.index', compact('sell_vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellvehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telephone_number' => 'required|digits:10',
            'e_mail' => 'required|email',
            'licence_plate' => 'required|unique:sell_vehicles,licence_plate',
            'mileage' => 'required|numeric',
            'equipment_and_accessories' => 'nullable|max:255',
            'condition' => 'nullable|max:255',
            'exterior_1_url' => 'required|file|image|max:2048',
            'exterior_2_url' => 'file|image|max:2048',
            'interior_1_url' => 'required|file|image|max:2048',
            'interior_2_url' => 'file|image|max:2048',
            'service_book_url' => 'file|image|max:2048',
            'summer_wheels_url' => 'file|image|max:2048',
            'winter_wheels_url' => 'file|image|max:2048',
            recaptchaFieldName() => recaptchaRuleName()
        ]);

        $requestData = $request->all();

        if ($request->hasFile('exterior_1_url')) {
            $exterior_1 = $request->file('exterior_1_url');
            $fileName = $request->licence_plate . '-ext(1)-' . time() . '.' . $exterior_1->getClientOriginalExtension();
            $path = $exterior_1->storeAs('vehicles_for_sale', $fileName);
            $requestData['exterior_1_url'] = $path;
        }
        
        if ($request->hasFile('exterior_2_url')) {
            $exterior_2 = $request->file('exterior_2_url');
            $fileName = $request->licence_plate . '-ext(2)-' . time() . '.' . $exterior_2->getClientOriginalExtension();
            $path = $exterior_2->storeAs('vehicles_for_sale', $fileName);
            $requestData['exterior_2_url'] = $path;
        }

        if ($request->hasFile('interior_1_url')) {
            $interior_1 = $request->file('interior_1_url');
            $fileName = $request->licence_plate . '-int(1)-' . time() . '.' . $interior_1->getClientOriginalExtension();
            $path = $interior_1->storeAs('vehicles_for_sale', $fileName);
            $requestData['interior_1_url'] = $path;
        }

        if ($request->hasFile('interior_2_url')) {
            $interior_2 = $request->file('interior_2_url');
            $fileName = $request->licence_plate . '-int(2)-' . time() . '.' . $interior_2->getClientOriginalExtension();
            $path = $interior_2->storeAs('vehicles_for_sale', $fileName);
            $requestData['interior_2_url'] = $path;
        }

        if ($request->hasFile('service_book_url')) {
            $service_book = $request->file('service_book_url');
            $fileName = $request->licence_plate . '-sb-' . time() . '.' . $service_book->getClientOriginalExtension();
            $path = $service_book->storeAs('vehicles_for_sale', $fileName);
            $requestData['service_book_url'] = $path;
        }

        if ($request->hasFile('summer_wheels_url')) {
            $summer_wheels = $request->file('summer_wheels_url');
            $fileName = $request->licence_plate . '-sw-' . time() . '.' . $summer_wheels->getClientOriginalExtension();
            $path = $summer_wheels->storeAs('vehicles_for_sale', $fileName);
            $requestData['summer_wheels_url'] = $path;
        }

        if ($request->hasFile('winter_wheels_url')) {
            $winter_wheels = $request->file('winter_wheels_url');
            $fileName = $request->licence_plate . '-ww-' . time() . '.' . $winter_wheels->getClientOriginalExtension();
            $path = $winter_wheels->storeAs('vehicles_for_sale', $fileName);
            $requestData['winter_wheels_url'] = $path;
        }

        SellVehicle::create($requestData);

        return redirect()->route('home')->withSuccess('Ditt fordon är skickat. Vi kommer att kontakta dig snart.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellVehicle  $sellVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(SellVehicle $customer_sale)
    {
        $customer_sale->update(['opened' => 1]);

        return view('sellvehicle.show', compact('customer_sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellVehicle  $sellVehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(SellVehicle $sellVehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellVehicle  $sellVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellVehicle $sellVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellVehicle  $sellVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellVehicle $sellVehicle)
    {
        //
    }
}
