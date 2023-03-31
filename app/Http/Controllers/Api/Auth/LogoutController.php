<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LogoutController extends Controller
{
    
    public function logout(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        foreach($user->tokens as $token)
        {
            $token->delete();
        }
        return Response::json([
            'status' => 'success',
            'code' => 204,
            'data' => "All user token has been deleted successfully",
        ]);
    }
}
