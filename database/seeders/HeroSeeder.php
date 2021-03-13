<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("heroes")->insert([
        	"name"=> Str::random("16"),
        	"location"=>Str::random("16"),
        	"division_code"=>Str::random("3"),
        	"date"=>now(),
        	"age"=>Str::random("2"),
        	"cod"=>Str::random("10")." ".Str::random("10"),
        	"desc"=>Str::random("5")." ".Str::random("5")." ".Str::random("8"),
        	"image"=>Str::random("10").".jpg"
        ]);
    }
}
