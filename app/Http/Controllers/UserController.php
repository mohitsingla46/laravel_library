<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard(Request $request){
    	$user_id = $request->session()->get('user_id');
    	$user = DB::table('users')->where('ID','=',$user_id)->first();
    	if($user){
    		echo $user->name;
    	}
    	else{
    		echo "error";
    	}
    	//return view('dashboard');
    }
}
