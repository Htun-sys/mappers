<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    //
    function crud_list() {
        $count = Hero::all()->count();
    	$data = Hero::orderBy("id","asc")->paginate(10);
    	return view("crud", ["data"=>$data, "count"=>$count]);
    }

    function home() {
        $count = Hero::all()->count();
        $data = Hero::orderBy("id","asc")->paginate(10);
        return view("home",  ["data"=> $data, "count"=>$count]);
    }

    function detail($id) {
        $data = Hero::find($id);
        return view("detail", ["data"=>$data]);
    }

    function add(Request $req) {
    	$hero = new Hero;
        if ($req->file("image")) {
        $path = $req->file("image")->store("images", "s3");
        Storage::disk("s3")->setVisibility($path, "public");
        $hero->image = $path;
        } else {
            $hero->image = "images/default.png";
        }
        
    	$hero->name = $req->name;
    	$hero->location = $req->location;
    	$hero->division_code = $req->division_code;
    	$hero->date = $req->date;
    	$hero->age = $req->age;
    	
    	if ($req->cod) {
    		$hero->cod = $req->cod;
    	} else {
    		$hero->cod = "Not Provided";
    	}

    	if ($req->desc) {
    	    $hero->desc = $req->desc;	
    	} else {
    		$hero->desc = "Not Provided";
    	}
    	$result = $hero->save();
    	if ($result) {
    		$req->session()->put(["status"=>"Entry has been added successfully", "type"=>"success"]);
    	} else {
    		$req->session()->put(["status"=>"There was an error in adding the entry", "type"=>"danger"]);
    	}
    	return redirect("/crud");

    }

    function delete($id) {
        $data = Hero::find($id);
        
        if (Storage::disk("s3")->exists($data->image) && $data->image !== "images/default.png") {
            Storage::disk("s3")->delete($data->image);
        }
        
    	Hero::find($id)->delete();
    	Session::put("status", "Entry has been deleted successfully");
    	Session::put("type", "success");
    	return redirect("/crud");
    }

    function edit($id) {
    	$data = Hero::find($id);
    	return view("edit", ["data"=>$data]);
    }

    function update(Request $req) {
    	$hero = Hero::find($req->id);
    	$hero->name = $req->name;
    	$hero->location = $req->location;
    	$hero->division_code = $req->division_code;
    	$hero->date = $req->date;
    	$hero->age = $req->age;

    	if ($req->cod) {
    		$hero->cod = $req->cod;
    	} else {
    		$hero->cod = "Not Provided";
    	}

    	if ($req->desc) {
    	    $hero->desc = $req->desc;	
    	} else {
    		$hero->desc = "Not Provided";
    	}

    	if ($req->file("image")) {
            if(Storage::disk("s3")->exists($req->orig_image_name) && $req->orig_image_name!=="images/default.png") {
            Storage::disk("s3")->delete($req->orig_image_name);
            }
        $path = $req->file("image")->store("images", "s3");
        Storage::disk("s3")->setVisibility($path, "public");
        $hero->image = $path;
        }

    	$result = $hero->save();
    	if ($result) {
    		$req->session()->put(["status"=>"Entry has been edited successfully", "type"=>"success"]);
    	} else {
    		$req->session()->put(["status"=>"There was an error in editing the entry", "type"=>"danger"]);
    	}
    	return redirect("/crud");
    }
}
