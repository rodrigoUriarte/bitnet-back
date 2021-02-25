<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //$validated = $request->validated();

        $user = User::where('email', $request->email)->first();
        $hash = Hash::check($request->password, $user->password);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['Sus credenciales no son correctas.']
            ], 401);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $permissions = $user->getAllPermissions()->pluck('name');

        $response = [
            'user' => $user,
            'token' => $token,
            'permissions' => $permissions
        ];

        return response($response, 201);
    }
}
