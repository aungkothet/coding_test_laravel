<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = Auth::user();

        $user->token = $user->createToken('My-token')->plainTextToken;

        return $this->sendResponse($user, 'User Login successfully.');
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->sendResponse([], 'User logout successfully.');
    }
}
