<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class ApiController extends Controller
{
   public function index() {

    return  response()->json([
        'status'=> 'succes',
        'message' => 'Questo è un messagio',

    ]);
   }
}
