<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    use ApiResponse;

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return $this->errorResponse("Unauthorized", Response::HTTP_UNAUTHORIZED);
        }

        return $this->respondWithToken($token);
    }
}