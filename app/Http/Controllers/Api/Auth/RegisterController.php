<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'phone' => ['required', 'numeric', 'digits:11', 'regex: /^01[0-2]\d{1,8}$/'],
            'roll_id'=> ['required', 'numeric', 'in:1,2']
        ]);

        if($valid->fails())
        {
            return Response::json([
                'status' => "fail",
                'code' => 401,
                'data' => $valid->messages(),
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'roll_id' => $request->roll_id,
        ]);

        return Response::json([
            'status' => "Success",
            "code" => 201,
            "data" => "User Created Successfully",
        ]);

    }
}
