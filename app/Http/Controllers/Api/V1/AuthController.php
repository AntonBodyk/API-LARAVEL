<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{ 
        
    public function createUser(Request $request){
        $validateUser = Validator::make($request->all(), 
        [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    
    public function loginUser(Request $request){
        $validateUser = Validator::make($request->all(), 
        [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'You cannot sign with those email and password',
                'status' => false
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        $userArray = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ];

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'user' => $userArray
        ], 200);
    }

    public function logoutUser(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }







   
    
}
