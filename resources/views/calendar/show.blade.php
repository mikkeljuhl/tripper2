@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Calendar</div>

                    <div class="panel-body">

                        <div class="month">
                            <ul>
                                <li class="prev">&#10094;</li>
                                <li class="next">&#10095;</li>
                                <li>
                                    August<br>
                                    <span style="font-size:18px">2016</span>
                                </li>
                            </ul>
                        </div>

                        <ul class="weekdays">
                            <li>Monday</li>
                            <li>Tuesday</li>
                            <li>Wednesday</li>
                            <li>Thursday</li>
                            <li>Friday</li>
                            <li>Saturday</li>
                            <li>Sunday</li>
                        </ul>

                        <ul class="days">
                            @foreach($dates as $date)
                                @foreach($calendars as $calendar)
                                    @if ($date == $calendar->date)
                                        @foreach($countries as $country)
                                            @if ($calendar->country_id == $country->id)
                                                <li>{{ $date  }} : {{ $country->name }}</li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>not filled</li>
                                        @endif
                                @endforeach
                            @endforeach
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
