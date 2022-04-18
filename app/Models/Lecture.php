<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'category',
        'lecturer',
        'date',
        'time',
        'cp',
        'location',
        'city',
        'quota',
        'poster_photo_path',
        'form_link',
        'group_link',
        'orginizer_name',
    ];

    protected $casts =[
        'quota' => 'integer',   
        'email_verified_at' => 'datetime' 
    ];
};
