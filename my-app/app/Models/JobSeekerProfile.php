<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class JobSeekerProfile extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'job_seeker_profiles';

    protected $fillable = [
        'user_id',
        'personal_details',
        'job_search_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
