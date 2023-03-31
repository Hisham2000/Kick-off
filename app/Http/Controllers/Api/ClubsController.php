<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClubsController extends Controller
{
    

    public function getAll()
    {
        $clubs = Clubs::with("admin")->orderBy("creationDate", "desc")->get();
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $clubs
        ]);
    }

    public function getClub($club_id)
    {
        $club = Clubs::with('admin')->where("id", $club_id)->get();
        if(!$club->isEmpty())
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $club
        ]);

        return Response::json([
            "status" => "fail",
            "code" => 404,
            "data" => "Club Not Found"
        ]);
    }

    public function countAdminClubs(Request $request)
    {
        $club = Clubs::where('admin_id', $request->user()->id)->get()->count();
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $club
        ]);
    }
}
