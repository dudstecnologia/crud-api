<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;

use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ])->save();

        return $this->generateToken(request());
    }

    public function login(AuthLoginRequest $request)
    {
        return $this->generateToken(request());
    }

    public function generateToken(Request $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Não autorizado'
            ], 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        $token->save();

        return response()->json([
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Deslogado com sucesso'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function teste()
    {
        return ['status'=>'ok'];
    }
}
