<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm(){
        $users = User::all();
        if ($users->count()>0) {
            if (Auth::user() == User::first()) {
                return view('auth.verify_credential_form');
            }else{
                abort(403, "You don't have access to do this.");
            }
        }else{
            return view('auth.register');
        }        
    }

    public function verifyCredential(Request $request){
        $this->validate($request, array(            
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ));        
        if ((Hash::check($request->password, User::first()->password)) && $request->email==User::first()->email) {
            return view('auth.register');
        }else{
            return redirect()->route('welcome');
        }
    }

    public function register(Request $request)
    {
        $users = User::all();
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        if ($users->count()==0) {
            $this->guard()->login($user);
        }
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }
}
