<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Job extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'jobs';
    protected $fillable = ['title', 'description', 'type', 'requirements', 'employer_id', 'status'];
    
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function matchedJobSeekers()
    {
        return $this->belongsToMany(JobSeeker::class, null, 'job_ids', 'job_seeker_ids');
    }
}