<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlateResource;
use App\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index(Request $request){

       $plates = Plate::all();

       return PlateResource::collection($plates);
    }
}
