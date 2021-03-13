<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $req) {
    	if ($req->password !== $req->confirm_password) {
    		$req->session()->put(["status"=>"Passwords do not match", "type"=>"warning"]);
    		return redirect("/register");
    	}

    	$user = new User;
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->password = Hash::make($req->password);
    	$result = $user->save();

    	if($result) {
    		$req->session()->put(["status"=>"User account created successfully", "type"=>"success"]);
    		return redirect("/login");
    	} else {
    		$req->session()->put(["status"=>"There was an unexpected error, please try again", "type"=>"danger"]);
    		return redirect("/register");
    	}

    }

    function login(Request $req) {
    	$user = User::where(["email"=>$req->email])->first();
    	if ($user && Hash::check($req->password, $user->password)) {
    		$req->session()->put("user", $user);
    		return redirect("/crud");
    	} else {
    		$req->session()->put(["status"=>"Username or Password incorrect", "type"=>"danger"]);
    		return redirect("/login");
    	}
    }

}
