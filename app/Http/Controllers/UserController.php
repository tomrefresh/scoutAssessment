<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all CRUD operations for the user
    |
    */


    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users.index')->with('users', $users);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return \App\User
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users_dev|max:30',
            'email' => 'required|email|unique:users_dev|max:50',
            'password' => 'required|min:8|max:60|confirmed',
            'mobile' => 'required|unique:users_dev|numeric|digits_between:10,15',
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'job_title' => 'required:max:255',


        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            #Create the user isntance
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->mobile = $request->mobile;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->job_title = $request->job_title;
            if ($request->has('bio')) {
                $user->bio = $request->bio;
            } else {
                $user->bio = NULL;
            }
            $user->save();

            #return to index page
            $users = User::orderBy('name')->get();
            return redirect('/')->with('users', $users)->withSuccess('User added successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            #return with error
            $users = User::orderBy('name')->get();
            return redirect('/')->with('users', $users)->withError('Something went wrong while adding your user, please try again');
        }
    }
}
