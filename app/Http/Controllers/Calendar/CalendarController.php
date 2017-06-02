<?php

namespace App\Http\Controllers\Calendar;

use App\Calendar;
use App\Http\Controllers\Controller;
use App\User;
use App\Country;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;


class CalendarController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $request->country_id = 1;
        $request->date = Carbon::now()->toDateString();
        
        $user = Auth::user();
        $calendar = $user->calendars()->create([
            'country_id' => $request->country_id,
            'date' => $request->date,
        ]);

        return $calendar;
    }


    public function show ($year, $month)
    {
        $start_date = Carbon::createFromDate($year, $month, 1);
        $end_date = Carbon::createFromDate($year, $month, $start_date->daysInMonth);

        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $start_date = Carbon::createFromDate($year, $month, 1);

        $calendars = Auth::user()->calendars()->where('date', '<=', $end_date->format('Y-m-d'))->where('date', '>=', $start_date->format('Y-m-d'))->get();

        $countries = Country::where('organization_id', Auth::user()->organization()->first()->id)->get();

        return view('calendar.show', ["dates" => $dates, 'calendars' => $calendars, 'countries' => $countries]);
    }
}
