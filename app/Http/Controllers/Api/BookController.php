<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Clubs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    

    public function getNumberAdminRequest(Request $request)
    {
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => Book::where("admin_id", $request->user()->id)->get()->count(),
        ]);
    }

    public function saveBook(Request $request)
    {

        $valid = Validator::make($request->all(),[
            "club_id" => ['required', 'exists:clubs,id'],
            "date" => ["required"],
            "start_time" => ["required"],
            "end_time" => ["required"]
        ]);

        if($valid->fails())
            return $valid->messages();
        $club = Clubs::find($request->club_id);
        Book::create([
            "status" => 0,
            "bookDate" =>  $request->date,
            "start_time" =>  $request->start_time,
            "end_time" =>  $request->end_time,
            "club_id" => $club->id,
            "admin_id" => $club->admin->id,
            "user_id" => $request->user()->id
        ]);

        
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => "Book Created Successfully"
        ]);
    }   

    public function bookReport(Request $request)
    {
        $report = Book::with("user", "club")->where("admin_id", $request->user()->id)->get();
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $report
        ]);
    }
}
