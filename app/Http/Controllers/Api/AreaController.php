<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Clubs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class AreaController extends Controller
{

    public function getAll()
    {
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => Area::all()
        ]);
    }

    public function countAdminArea(Request $request)
    {
        $area = Clubs::where('admin_id', $request->user()->id)->get()->groupBy('area_id')->count();
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $area
        ]);
    }
}
