<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use Auth;

class CountryController extends Controller
{

    public function index()
    {
        return view('country.index');
    }

    public function store(Request $request)
    {
        $organization = Auth::user()->organization()->first();
        $country = $organization->countries()->create(['name' => $request->name]);

        return $country;
    }

}
