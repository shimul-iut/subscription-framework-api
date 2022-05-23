<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_title',
        'website_url',
    ];

    public function post(){
        $this->hasMany(Post::class);
    }

    public function subscriber(){
        $this->hasMany(Subscriber::class);
    }

}
