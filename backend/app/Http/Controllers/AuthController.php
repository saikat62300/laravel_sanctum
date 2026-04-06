<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Traits\HttpResponses;
use Auth;
use App\Models\User;

class AuthController extends Controller
{   
    use HttpResponses;

    public function login(LoginRequest $request){        
        
            if(!Auth::attempt($request->only('email', 'password'))){
                return $this->error('Invalid credentials', 401);
            }

            $user = User::find(Auth::user()->id);

            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of '. $user->email)->plainTextToken 
            ], 'You have logged in successfully', 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->success(null, 'You have logged out successfully', 200);
    }
}
