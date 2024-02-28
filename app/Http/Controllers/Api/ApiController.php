<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technologie;


class ApiController extends Controller
{
    public function getTest(){
        return response()->json([
            'status' => 'success',
            'message' => 'Questo è un test'
        ]);
    }

    public function getTechnologies(){
        $technologies = Technologie ::all();

        return response()->json([
            'status' => 'success',
            'technologies' => $technologies,

        ]);
    }
}
