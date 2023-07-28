<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function store(RegisterRequest $request)
    {
        $loginPasswordSalt = $this->generateSalt($request->first_name, $request->last_name);
        $user = User::create([
            'login_password_salt' => $loginPasswordSalt,
            'login_password_hash' => bcrypt($request->password . $loginPasswordSalt),
            'user_creation_datetime' => now(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);
        $user->token = $user->createToken('Phluid-token')->plainTextToken;
        return $this->sendResponse($user, 'User register successfully.', Response::HTTP_CREATED);
    }


    public function generateSalt($firstName, $lastName)
    {
        $firstChar = Str::substr($firstName, 0, 1);
        $secondChar = Str::substr($lastName, 0, 1);
        return Str::upper($firstChar . $secondChar . now()->format('ymdis'));
    }
}
