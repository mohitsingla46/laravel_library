<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function dologin(Request $request){
        $messages = [
            'email.required' => 'Email ID is required',
            'pass.required' => 'Password is required',
            'pass.min' => 'Password must be minimum 8 characters'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'pass' => 'required|min:8'

        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        else{
            $users = DB::table('users')->where('email','=',$request->input('email'))->where('pass','=',$request->input('pass'))->first();
            if($users){
                $request->session()->put('user_id', $users->ID);
                return redirect('dashboard');
            }
            else{
                echo "fail";
            }
        }
    }
}
