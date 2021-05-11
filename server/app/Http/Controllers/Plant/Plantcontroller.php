<?php

namespace App\Http\Controllers\Plant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Plantcontroller extends Controller
{
    public function index(){
      return Plant::get();
    }

    public function show($id){
      return Plant::find($id)->get();
    }
}
