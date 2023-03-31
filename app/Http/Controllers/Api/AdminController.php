<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    

    public function getAdminClubs(Request $request)
    {
        $clubs = Clubs::where('admin_id', $request->admin_id)->get();
        Views::create([
            "admin_id" => $request->admin_id,
            "user_id" => $request->user()->id
        ]);
        if(!$clubs->isEmpty())
        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => $clubs
        ]);

        return Response::json([
            'status' => "Fail",
            'code' => 404,
            'data' => "Admin Id Not Found"
        ]);
    }
}
