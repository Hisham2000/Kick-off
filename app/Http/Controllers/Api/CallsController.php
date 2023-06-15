<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CallsController extends Controller
{
    
    public function getAdminCalls(Request $request)
    {
        $numCalls = Calls::with('user')->where('admin_id', $request->user()->id)->get()->count();
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $numCalls
        ]);
    }

    public function callsReport(Request $request)
    {
        $report = Calls::with(['user', 'club'])->where('admin_id', $request->user()->id)->get();
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $report,
        ]);
    }

    public function saveCall(Request $request)
    {
        $valid = Validator::make($request->all(),[
            "admin_id" => ["required", "exists:users,id"],
            "date" => ["required"],
            "start_time" => ["required"],
            "end_time" => ["required"]
        ]);
        if($valid->fails())
            return $valid->messages();

        Calls::create([
            "creationdate" => $request->date,
            "start_time"=> $request->start_time,
            "end_time" => $request->end_time,
            'admin_id' => $request->admin_id,
            'user_id' => $request->user()->id,
            'club_id' => $request->club_id,
        ]);

        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => "call Saved successfully",
        ]);
    }
}
