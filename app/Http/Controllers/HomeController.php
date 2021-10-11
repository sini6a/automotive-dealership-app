<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SellVehicle;
use App\Vehicle;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vehicles = Vehicle::where('sold', 0)->orderBy('id', 'desc')->paginate(9);

        return view('index', compact('vehicles'));
    }

    public function polish_index() 
    {
        return view('home.polish');
    }

    public function service_index()
    {
        return view('home.workshop');
    }

    public function sell_vehicle() 
    {
        return view('sellvehicle.create');
    }

    public function about_us()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function sendMail(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'telephone_number' => 'required|digits:10',
            'e_mail' => 'required|email',
            'message' => 'required|max:255',
            recaptchaFieldName() => recaptchaRuleName()
        ]);

        $mail = new \StdClass();
        $mail->name = $request->input('name');
        $mail->telephone_number = $request->input('telephone_number');
        $mail->e_mail = $request->input('e_mail');
        $mail->message = $request->input('message');
        $mail->receiver = 'Eriksson bilcenter';
        $mail->sender = 'Eriksson bilcenter hemsida';

        Mail::to("info@erikssonbil.com")->send(new ContactMail($mail));

        return redirect()->route('home')->withSuccess('Your message was successfully sent.');
    }
}
