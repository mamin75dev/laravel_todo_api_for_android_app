<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getAllCities(Request $request)
    {
        return City::orderBy('updated_at', 'DESC')->get();
    }

    public function getCityById(Request $request)
    {
        // $id = $request['id'];
        // return City::where('id', $id)->get();
        return City::find($request['id']);
    }

    public function searchCities(Request $request)
    {
        $query = $request['q'];
        return City::where('name', 'like', '%' . $query . '%')->get();
    }
}
