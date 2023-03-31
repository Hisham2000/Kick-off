<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if($valid->fails())
        {
            return Response::json([
                'status' => "fail",
                'code' => 401,
                'data' => $valid->messages(),
            ]);
        }

        $user = User::with('rolles')->where('email', $request->email)->first();
        if($user &&  Hash::check($request->password, $user->password))
        {            
            $token = $user->createToken($user->password);
            return Response::json([
                'status' => "success",
                'code' => 201,
                'data' => [
                    'userData' => $user,
                    'token' => $token->plainTextToken,
                ],
            ]);
        }

        return Response::json([
            'status' => "failed",
            'code' => 401,
            'data' => "there was an error in email or password or roll",
        ]);
    }
}
