<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'website_id',
        'prev_notified_post_id'
    ];

    public function website(){
        return $this->belongsTo(Website::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
