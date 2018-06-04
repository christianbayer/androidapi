<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $fillable = [
        'tracker_id',
        'latitude',
        'longitude',
        'altitude',
        'marked_at',
        'synchronized_at',
    ];
    
    public function tracker()
    {
        return $this->belongsTo(Tracker::class, 'tracker_id', 'id');
    }
}
