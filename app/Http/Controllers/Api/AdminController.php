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
        
        if(!$clubs->isEmpty())
        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => $editedClub
        ]);

        return Response::json([
            'status' => "Fail",
            'code' => 404,
            'data' => "Admin Id Not Found"
        ]);
    }
}
