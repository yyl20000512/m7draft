<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class JobSeeker extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'job_seekers';
    protected $fillable = ['name', 'email', 'password', 'profile', 'job_search_status', 'matches'];

    public function matches()
    {
        return $this->belongsToMany(Job::class, null, 'job_seeker_ids', 'job_ids');
    }
}
