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


    /**
     * Returns the user index
     *
     * @return \App\Users / view
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

        #Check validation
        $validator = $this->validateCreateUser($request->all());
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
            return redirect('/')->with('users', $users)->withSuccess('User ' . $request->name . ' ' . $request->surname . '  added successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            #return with error
            $users = User::orderBy('name')->get();
            return redirect('/')->with('users', $users)->withError('Something went wrong while adding your user, please try again');
        }
    }


    /**
     * View the edit page for a user
     *
     * @param  Request $request
     * @return View
     */
    public function edit()
    {
        $user = User::findOrFail(request()->query('id'));
        return view('users.edit')->with('user', $user);
    }


    /**
     * Update the details on an existing user
     *
     * @param  Request $request
     * @return View
     */
    public function update(Request $request)
    {

        $user = User::find($request->id);
        $validator = $this->validateUpdateUser($request, $user);

        if ($validator->fails()) {
            return redirect('/user-edit?id=' . $user->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {

            #Create the user isntance
            $user->username = $request->username;
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
            return redirect()->route('user_edit', ['id' => $user->id])->withSuccess('User updated successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            #return with error
            return redirect()->route('user_edit', ['id' => $user->id])->withError('Something went wrong while updating your user, please try again');
        }
    }


    /**
     * Permanently delete this user
     *
     * @param  Request $request
     * @return View
     */
    public function destroy()
    {

        DB::beginTransaction();
        try {
            $user = User::findOrFail(request()->query('id'));
            $user->delete();
            DB::commit();
            $users = User::orderBy('name')->get();
            return redirect('/')->with('users', $users)->withSuccess('User deleted successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            #return with error
            $users = User::orderBy('name')->get();
            return redirect('/')->with('users', $users)->withError('Something went wrong while adding your user, please try again');
        }
    }


    /**
     * Validation for creating a user
     *
     * @param  rules
     * @return Validator
     */
    private function validateCreateUser($request)
    {
        return Validator::make($request, [
            'username' => 'required|unique:users_dev|max:30',
            'email' => 'required|email|unique:users_dev|max:50',
            'password' => 'required|min:8|max:60|confirmed',
            'mobile' => 'required|unique:users_dev|numeric|digits_between:10,15',
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'job_title' => 'required:max:255',
        ]);
    }


    /**
     * Validation for updating a user
     *
     * @param  rules
     * @return Validator
     */
    private function validateUpdateUser($request, $user)
    {
        $rules = [
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'job_title' => 'required:max:255',
        ];
        if ($user->username != $request->username) {
            $rules['username'] = 'required|unique:users_dev|max:30';
        } else {
            $rules['username'] = 'required|max:30';
        }
        if ($user->mobile != $request->mobile) {
            $rules['mobile'] = 'required|unique:users_dev|numeric|digits_between:10,15';
        } else {
            $rules['mobile'] = 'required|numeric|digits_between:10,15';
        }
        return Validator::make($request->all(), $rules);
    }
}
