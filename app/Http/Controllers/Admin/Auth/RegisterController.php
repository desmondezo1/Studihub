<?php

namespace Studihub\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\Role;
use Studihub\Models\User;

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
    protected $redirectTo = '/admin/admins';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){
        $roles = Role::all();
        return view('admin.auth.register',compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric|regex:/[0-9]{10}/|digits:11|unique:admins',
            'gender' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string',
            'role' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Studihub\Models\Admin
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'password' => bcrypt($data['password']),
            'password_confirmation' => $data['password_confirmation'],
        ]);
    }

    public function register(){
        $data = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'phone' => request()->input('phone'),
            'gender' => request()->input('gender'),
            'password' => request()->input('password'),
            'password_confirmation' => request()->input('password_confirmation'),
            'role' => request()->input('role')
        ];

        $val = $this->validator($data);
        if($val->passes()){
            $admin = $this->create($data);
            $admin->setRole($data['role']);
            return redirect()->route('admin.admins.index');
        }
        return back()->withErrors($val);
    }
}
