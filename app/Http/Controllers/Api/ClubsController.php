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
        $editedClub = collect();
        foreach($clubs as $club)
        {
            $club->rate = null;
            $sum = 0;
            foreach($club->review as $review)
            {
                $sum += $review->rate;
            }
            if($club->review->count() > 0)
                $club->rate = round($sum / $club->review->count());
            else $club->rate = 0;
            $editedClub->push($club);
        }
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $editedClub
        ]);
    }

    public function getClub($club_id)
    {
        $club = Clubs::with('admin','review')->where("id", $club_id)->get()->first();
        $editedClub = collect();
        $sum = 0;
        $club['rate'] = null;
        foreach($club->review as $review)
        {
            $sum += $review->rate;
        }
        if($club->review->count() > 0)
            $club['rate'] = round($sum / $club->review->count());
        else $club['rate'] = 0;
        $editedClub->push($club);

        if(!$editedClub->isEmpty())
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => $editedClub
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
