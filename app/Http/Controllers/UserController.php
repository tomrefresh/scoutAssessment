<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        $users = User::all();
        return view('users.index')->with('users', $users);
    }
}
