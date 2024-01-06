<?php

namespace App\Http\Controllers;

use App\Models\Notary;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = Notary::where('email', $request->email)->first();
        if ($user && $request->password == $user->password) {
            $currentTime = time();
            $expiryTime = $currentTime + 3600;
            $expiryDate = number_format($expiryTime, 0, '', '');
            $accessToken = $user->createToken('authToken', ['user_id' => $user->id])->accessToken;
            $response = response()->json([
                'user' => $user,
                'access_token' => $accessToken->token,
                'expiry_date' => $expiryDate
            ], 200, [], JSON_PRETTY_PRINT)
            ->withHeaders([
                'expiry_date' => $expiryDate,
            ]);
            return $response;
        } else {
            return response()->json([
                'error' => 'The email or password is incorrect',
            ], 401);
        }
    }
}
