<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokenController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'sometimes|required',
            'abilities' => 'required|array'
        ]);

//        dd($request->all());

        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        return response()->json([
            'token' => auth()->user()->createToken($request->post('device_name', $request->userAgent()) , $request->post('abilities'))->plainTextToken,
            'user' => auth()->user()
        ]);

    }


    public function destroy($token = null)
    {

        $user = auth('sanctum')->user();
        //logout from all devices
//        $user->tokens()->delete();
        if (null === $token) {
            $user->currentAccessToken->delete(); // Revoke the current token
            return response()->json([
                'message' => 'Token deleted successfully'
            ]);
        }

        $tokenOfUser = PersonalAccessToken::findToken($token);
        if (
            $tokenOfUser &&
            $tokenOfUser->tokenable_id === $user->id &&
            $tokenOfUser->tokenable_type === get_class($user)

        ) {
            {
                $tokenOfUser->delete();
                return response()->json([
                    'message' => 'Token deleted successfully'
                ]);
            }

        }
    }
}
