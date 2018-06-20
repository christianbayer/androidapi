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
            'marked_at'       => $inputs['marked_at'],
            'synchronized_at' => Carbon::now(),
        ]);
        
        return [
            'status'  => 200,
            'message' => 'Coordinate saved.',
            'data'    => $coordinate,
        ];
    }
}
