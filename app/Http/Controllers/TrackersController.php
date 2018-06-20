<?php

namespace App\Http\Controllers;

use App\Tracker;
use App\User;
use Illuminate\Http\Request;

class TrackersController extends Controller
{
    private $userModel;
    private $trackerModel;
    
    public function __construct(User $userModel, Tracker $trackerModel)
    {
        $this->userModel = $userModel;
        $this->trackerModel = $trackerModel;
    }
    
    public function show(User $user)
    {
        return [
            'status'  => 200,
            'message' => 'Trackers found.',
            'data'    => $user->trackers()->orderBy('id', 'desc')->get(),
        ];
    }
    
    public function store(User $user, Request $request)
    {
        $inputs = $request->all();
        $tracker = $user->trackers()->create([
            'name' => $inputs['name'],
        ]);
        
        return [
            'status'  => 200,
            'message' => 'Registered.',
            'data'    => $tracker,
        ];
    }
}
