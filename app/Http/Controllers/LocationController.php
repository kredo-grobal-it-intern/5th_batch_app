<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function generateCategories(){
        $catArray = [
            'Amusement Park',
            'Cafe',
            'Dogrun',
            'Hospital'
        ];

       for($x = 0; $x < count($catArray); $x++):
            Category::create([
                'name'=>$catArray[$x]
            ]);
       endfor;


    }
}
