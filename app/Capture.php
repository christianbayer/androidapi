<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capture extends Model
{
    protected $fillable = [
        'tracker_id',
        'location',
        'captured_at',
        'synchronized_at',
    ];
    
    public function tracker()
    {
        return $this->belongsTo(Tracker::class, 'tracker_id', 'id');
    }
}
