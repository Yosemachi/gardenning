<?php

namespace App\Http\Controllers\Plant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plants;

class PlantController extends Controller
{
    public function index(){
      return Plants::get();
    }

    public function show($id){
      return Plants::find($id)->get();
    }

    public function save(Request $request){
      dd($request->all());
      return Plants::create($request->all());
    }

}
