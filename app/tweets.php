<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'img_vid_id', 'user_id','timestamp',
    ];

    protected $table = 'tweets';
}