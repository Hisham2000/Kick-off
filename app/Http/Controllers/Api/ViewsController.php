<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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
            'data' => Views::with(['user', 'club'])->where("admin_id", $request->user()->id)->get(),
        ]);
    }

    // public function saveView(Request $request)
    // {
    //     $valid = Validator::make($request->all(),[
    //         "admin_id" => ['required', 'exists:users,id'],
    //     ]);
    //     if($valid->fails())
    //         return $valid->messages();
    //     Views::create([
    //         "admin_id" => $request->admin_id,
    //         "user_id" => $request->user()->id
    //     ]);
    // }
}
