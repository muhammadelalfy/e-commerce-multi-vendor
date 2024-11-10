<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class CustomAuthentication
{
    public function authenticate($request)
    {
        $userName = config('fortify.username');
        $user = Admin::where('email', $request->$userName)
            ->orWhere('phone', $request->$userName)
            ->orWhere('username', $request->$userName)
            ->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return $user;
        }

        return false;
    }

}
