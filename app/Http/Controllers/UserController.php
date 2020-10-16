<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function edit($id)
    {
       
        $user = User::find($id);
        return view('useredit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email',
            'date' => 'required',
            'phone' => 'required'
          ]);

        //Update Profile
        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->date = $request->input('date');
        $user->phone = $request->input('phone');
        
        $user->save();

        return redirect('/home')->with('success', 'Profile Updated');
    }
}
