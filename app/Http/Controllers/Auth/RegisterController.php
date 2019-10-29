<?php

namespace sysbar\Http\Controllers\Auth;

use sysbar\User;
use sysbar\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Caffeinated\Shinobi\Models\Role;
use DB;

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
    protected $redirectTo = '/home';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
        protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'apellido' => 'required|string|max:100',
            't_documento' => 'required|string|max:100',
            'n_documento' => 'required|max:11',
            'telefono' => 'required|string|max:100',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \sysbar\User
     */
    protected function create(array $data)
    {
        $role_standard = Role::where('name','Standard')->first();

        $user = User::create([
            'name'          => $data['name'],
            'apellido'      => $data['apellido'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
            't_documento'   => $data['t_documento'],
            'n_documento'   => $data['n_documento'],
            'telefono'      => $data['telefono'],
        ]);

        $user->roles()->attach($role_standard);
        return $user;
    }
}
