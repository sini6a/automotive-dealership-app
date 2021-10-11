<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = (new Vehicle)->newQuery();
        $filter = $request->get('filter', 'all');
        $search = $request->get('search', '');

        if ($filter == 'sold') {
            $query->where('licence_plate', 'like', $search . '%')->whereSold(1);
        }
        elseif ($filter == 'available') {
            $query->where('licence_plate', 'like', $search . '%')->whereSold(0);
        }

        $vehicles = $query->where('licence_plate', 'like', $search . '%')->orderBy('id', 'desc')->paginate(10);
        //dd($vehicles);

        //$vehicles = Vehicle::orderBy('id', 'desc')->paginate(3);

        return view('vehicle.index', compact('vehicles', 'filter', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ContactMail::send();

        return view('vehicle.create');
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
            'make' => 'required',
            'model' => 'required',
            'link_url' => 'required',
            'licence_plate' => 'required|unique:vehicles,licence_plate',
            'link_url' => 'required',
            'picture_url' => 'required|file|image|max:2048',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('picture_url')) {
            $picture = $request->file('picture_url');
            $fileName = $request->licence_plate . '-main_picture-' . time() . '.' . $picture->getClientOriginalExtension();
            $path = $picture->storeAs('vehicles/', $fileName);
            $requestData['picture_url'] = $path;
        }

        Vehicle::create($requestData);

        return redirect()->route('vehicles.index')->withSuccess('Vehicle added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'link_url' => 'required',
            'licence_plate' => 'required',
            'link_url' => 'required',
            'picture_url' => 'file|image|max:2048',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('picture_url')) {
            $picture = $request->file('picture_url');
            $fileName = $request->licence_plate . '-main_picture-' . time() . '.' . $picture->getClientOriginalExtension();
            $path = $picture->storeAs('vehicles/', $fileName);
            $requestData['picture_url'] = $path;
        }
        

        $vehicle->update($requestData);

        return redirect()->route('home');
    }

    public function mark_as_sold(Vehicle $vehicle) 
    {
        $vehicle->update(['sold' => 1]);

        //session()->put('success', 'Vehicle successfully marked as sold!');

        return redirect()->back();
    }

    public function mark_as_unsold(Vehicle $vehicle) 
    {
        $vehicle->update(['sold' => 0]);

        return redirect()->back();
    }

    public function confirm_deletion(Vehicle $vehicle) 
    {
        return view('vehicle.confirm_delete', compact('vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('home');
    }
}
