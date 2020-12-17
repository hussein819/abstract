<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['sometimes', 'file', 'mimes:jpg,png,jpeg,gif'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   $request=Request();
        $user = \App\Models\User::all();
        //$request = app('request');
        /* if ($request->hasfile('avatar')) {
             $avatar = $request->file('avatar');
             $path = public_path() . '/users/profile_image';
             $filename = time() . '.' . $avatar->getClientOriginalExtension();
            // Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
             $avatar->move($path, $filename);
         }*/
        if( $request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = public_path(). '/users/profile_image/';
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move($path, $filename);

            $user->avatar = $path;
            $user=$filename;
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' =>$filename
        ]);
    }

}
