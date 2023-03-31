<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rolles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RollesController extends Controller
{
    public function gelAll()
    {
        return Response::json([
            "status" => "success",
            "code" => 200,
            "data" => Rolles::all()
        ]);
    }
}
