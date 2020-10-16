<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;
use App\Car;
use App\User;

class CarsController extends Controller
{
    public function create()
    {
        $location = Locations::pluck('city','id');
        return view('addcar')->with('location',$location);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'fuel' => 'required',
            'price' => 'required'
          ]);

        //Create Car
        $cars = new Car;
        $cars->locations_id = $request->input('locations_id');
        $cars->brand = $request->input('brand');
        $cars->model = $request->input('model');
        $cars->year = $request->input('year');
        $cars->fuel = $request->input('fuel');
        $cars->price = $request->input('price');    
        
        $cars->save();

        return redirect('/home')->with('success', 'Car Added Successfully');
    }


    public function edit($id)
    {
       
        $cars = Car::find($id);
        return view('editcar')->with('cars', $cars);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'fuel' => 'required',
            'price' => 'required'
          ]);

        //Update Car
        $cars = Car::find($id);
        $cars->brand = $request->input('brand');
        $cars->model = $request->input('model');
        $cars->year = $request->input('year');
        $cars->fuel = $request->input('fuel');
        $cars->price = $request->input('price');    
        
        $cars->save();

        return redirect('/home')->with('success', 'Car Updated Successfully');
    }


    public function destroy($id)
    {
        $cars = Car::find($id);
        $cars->delete();

        return redirect('/home')->with('success', 'Car Deleted');
    }


    public function show($id)
    {
        $cars = Car::find($id);
        $user = \Auth::user()->firstname;
        return view('rentacar')->with('cars',$cars)->with('user',$user);
    }
}
