<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    

    public function getAdminClubs($admin_id)
    {
        $clubs = Clubs::where('admin_id', $admin_id)->get();
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
