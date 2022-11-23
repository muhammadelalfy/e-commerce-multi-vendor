<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AccessTokenController extends Controller
{
    public function store(TokenRequest $request){
//
//dd('dd');
//        dd('ss');
// $request->validate([
//     'email' => 'required|email|max:255',
//     'password' => 'required|string|min:10',
//     'device_name' => 'string|max:255'
// ]);

        $user = User::where('email' , $request->email)->first();
        $device_name = $request->post('device_name' , $request->userAgent());
        if ($user && Hash::check($request->password , $user->password)){

        $token = $user->createToken($device_name);

        return Response::json([
            'code' => 100,
            'token' => $token->plainTextToken,
            'user' => $user
        ] , 201);
    }

        return Response::json([
            'code' => 0,
            'message' => 'unauthenticated token'
        ] , 401);
    }
}
