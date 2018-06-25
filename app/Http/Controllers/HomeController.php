<?php

namespace App\Http\Controllers;

use App\Tracker;

class HomeController extends Controller
{
    private $trackerModel;

    public function __construct(Tracker $trackerModel)
    {
        $this->trackerModel = $trackerModel;
    }

    public function index()
    {
        $data = [
            'trackers' => $this->trackerModel->get(),
        ];
        return view('home', compact('data'));
    }
}
