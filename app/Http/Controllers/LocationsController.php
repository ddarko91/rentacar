<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;
use App\Car;
use App\User;


class LocationsController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addlocation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'email' => 'email',
            'address' => 'required',
            'phone' => 'required'
          ]);

        //Create locations
        $location = new Locations;
        $location->city = $request->input('city');
        $location->email = $request->input('email');
        $location->address = $request->input('address');
        $location->phone = $request->input('phone');
        
        $location->save();

        return redirect('/home')->with('success', 'Location Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Locations::find($id);
        $cars = Car::all();
        return view('showlocation')->with('location', $location)->with('cars',$cars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Locations::find($id);
        return view('editlocation')->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'city' => 'required',
            'email' => 'email',
            'address' => 'required',
            'phone' => 'required'
          ]);

        //Update locations
        $location = Locations::find($id);
        $location->city = $request->input('city');
        $location->email = $request->input('email');
        $location->address = $request->input('address');
        $location->phone = $request->input('phone');
        
        $location->save();

        return redirect('/home')->with('success', 'Location Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Locations::find($id);
        $location->delete();

        return redirect('/home')->with('success', 'Location Deleted');
    }

    public function addcar()
    {
        $cars = Car::all();

        return view('addcar')->with('cars',$cars);
    }
    
}
