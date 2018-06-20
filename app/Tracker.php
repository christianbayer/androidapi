<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];
    
    public function coordinates()
    {
        return $this->hasMany(Coordinate::class, 'tracker_id', 'id');
    }
    
    public function captures()
    {
        return $this->hasMany(Capture::class, 'tracker_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
