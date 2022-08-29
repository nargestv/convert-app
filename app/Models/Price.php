<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Price extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = ['title', 'content','image','slug'];

}
