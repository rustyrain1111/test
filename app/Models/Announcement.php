<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'id', 'title', 'body',
    ];
    protected $hidden = [
        'status', 'user_id'
    ];


}
