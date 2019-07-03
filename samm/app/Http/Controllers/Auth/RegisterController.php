<?php

namespace App\Http\Controllers\Auth;

use App\Researcher;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/main';

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
//            'first_name' => 'required|max:100',
//            'last_name' => 'required|max:155',
//            'nin'=> 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $userObject = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $researcher = new Researcher();
        $researcher->first_name = $data['first_name'];
        $researcher->last_name = $data['last_name'];
        $researcher->nin = $data['nin'];
        $researcher->external_url = $data['external_url'];
        if(empty($data['type']))
            $researcher->type = 0;
        else
            $researcher->type = 1;
        $researcher->id_user = $userObject->getAttribute('id');
        $researcher->save();

        //print_r($data);
        return $userObject;
    }
}
