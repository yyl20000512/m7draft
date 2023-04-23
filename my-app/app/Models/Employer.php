<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Employer extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'employers';
    protected $fillable = ['name', 'email', 'password', 'company', 'jobs'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}