<?php

namespace App\Http\Controllers;

use App\Capture;
use App\Tracker;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CapturesController extends Controller
{
    private $userModel;
    private $trackerModel;
    private $captureModel;
    
    public function __construct(User $userModel, Tracker $trackerModel, Capture $captureModel)
    {
        $this->userModel = $userModel;
        $this->trackerModel = $trackerModel;
        $this->captureModel = $captureModel;
    }
    
    public function show(User $user, Tracker $tracker)
    {
        return [
            'status'  => 200,
            'message' => 'Coordinates found.',
            'data'    => $tracker->captures()->orderby('id', 'desc')->get(),
        ];
    }
    
    public function store(User $user, Tracker $tracker, Request $request)
    {
        $inputs = $request->all();
        $capture = $tracker->captures()->create([
            'location'        => $this->saveImage($request->file('image')),
            'captured_at'     => $inputs['captured_at'],
            'synchronized_at' => Carbon::now(),
        ]);
        
        return [
            'status'  => 200,
            'message' => 'Capture saved.',
            'data'    => $capture,
        ];
    }
    
    public function saveImage()
    {
        // ... save image here
        return '';
    }
}
