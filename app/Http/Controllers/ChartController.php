<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;

class ChartController extends Controller
{
    //
    function chart() {
    	$data = Hero::all();
    	return view("chart", ["data"=>$data]);
    }
}
