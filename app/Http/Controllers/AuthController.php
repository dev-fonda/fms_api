<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Request as RequestFacade;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller 
{
    public function login(Request $request) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(User::$loginRules)) { 
                return User::login($request);
            }
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
    
    public function register(Request $request) 
    { 
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(User::$registerRules)) { 
                return User::register($request);
            }
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
    
    public function getDetails() 
    {   
        if (Auth::check()) {
            $user = Auth::user(); 
            return response()->json(['success' => $user]); 
        }
    } 
    
    public function logout(Request $request) {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            
            return response()->json(['success' => true, 'message' => 'Logout Successul.']);
        }
    }
}