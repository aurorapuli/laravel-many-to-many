<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class ApiController extends Controller
{
   public function index() {

    $technologies = Technology :: all();

    return response()->json([

        'status' => 'success',
        'technologies' => $technologies

    ]);
   }
}
