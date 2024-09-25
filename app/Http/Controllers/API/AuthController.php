<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\JWT;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;

        try {
            $user = User::where('username', $username)->where('password', $password)->firstOrFail();
            $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
            $payload = json_encode([
                'user_id' => $user->id,
                'iat' => Carbon::now(),
            ]);
            $secret = env('ACCESS_TOKEN_SECRET');
            $jwt = new JWT();
            $token = $jwt->createJwt($header, $payload, $secret);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage(), 'data' => $username], 400);
        }

        return response()->json(['status' => 'success', 'token' => $token]);
    }
}
