<?php

namespace App\Http\Controllers;

use App\Capture;
use App\Tracker;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'location'        => $this->saveImage($inputs['image']),
            'captured_at'     => Carbon::now(),
            'synchronized_at' => Carbon::now(),
        ]);
        
        return [
            'status'  => 200,
            'message' => 'Capture saved.',
            'data'    => $capture,
        ];
    }
    
    public function saveImage($image)
    {
        $filename= "capture-".time().".jpg";
        $path = 'img/'.$filename;
        $binary = base64_decode($image);

        header('Content-Type: bitmap; charset=utf-8');

        $file = fopen(public_path($path), "wb");
        fwrite($file, $binary);
        fclose($file);

        return $path;
    }

    public function lastCapture(User $user, Tracker $tracker)
    {
        $last = $tracker->captures->last();
        $data=[
            'location' => $last->location,
        ];
        return view('lastCapture', compact('data'));
    }
}
