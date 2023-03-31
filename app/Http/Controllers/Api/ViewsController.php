<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ViewsController extends Controller
{
    public function countViews(Request $request)
    {
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => Views::where("admin_id", $request->user()->id)->get()->count(),
        ]);
    }

    public function viewsReport(Request $request)
    {
        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => Views::with('user')->where("admin_id", $request->user()->id)->get(),
        ]);
    }
}
