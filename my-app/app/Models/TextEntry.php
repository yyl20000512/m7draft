<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TextEntry extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'text_entries';

    protected $fillable = [
        'text',
    ];
}