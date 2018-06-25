<?php

namespace App\Http\Controllers;

use App\Coordinate;
use App\Tracker;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoordinatesController extends Controller
{
    private $userModel;
    private $trackerModel;
    private $coordinateModel;
    
    public function __construct(User $userModel, Tracker $trackerModel, Coordinate $coordinateModel)
    {
        $this->userModel = $userModel;
        $this->trackerModel = $trackerModel;
        $this->coordinateModel = $coordinateModel;
    }
    
    public function show(User $user, Tracker $tracker)
    {
        return [
            'status'  => 200,
            'message' => 'Coordinates found.',
            'data'    => $tracker->coordinates()->orderby('id', 'desc')->get(),
        ];
    }
    
    public function store(User $user, Tracker $tracker, Request $request)
    {
        $inputs = $request->all();
        $coordinate = $tracker->coordinates()->create([
            'latitude'        => $inputs['latitude'],
            'longitude'       => $inputs['longitude'],
            'altitude'        => $inputs['altitude'],
            'marked_at'       => Carbon::now(),
            'synchronized_at' => Carbon::now(),
        ]);
        
        return [
            'status'  => 200,
            'message' => 'Coordinate saved.',
            'data'    => $coordinate,
        ];
    }

    public function lastCoordinate(User $user, Tracker $tracker)
    {
        $last = $tracker->coordinates->last();
        $data=[
            'latitude' => $last->latitude,
            'longitude' => $last->longitude,
        ];
        return view('lastCoordinate', compact('data'));
    }

    public function trace(User $user, Tracker $tracker)
    {
        $coordinates = $tracker->coordinates()->orderBy('id', 'desc')->take(1000)->get();
        $last = $tracker->coordinates->last();
        $points = [];
        foreach ($coordinates as $coordinate){
            $points[] = [
                'lat' => (float) $coordinate->latitude,
                'lng' => (float) $coordinate->longitude,
            ];
        }
        $center = [
            'lat' => (float) $last->latitude,
            'lng' => (float) $last->longitude,
        ];

        $data=[
            'points'=>json_encode($points),
            'center'=>json_encode($center)
        ];
        return view('trace', compact('data'));
    }
}
