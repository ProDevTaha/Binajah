<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'matier',
        'niveaux',
        'discription',
        'statut',
        'created_by',
        'folder',
        'img_course',
        'title',
        'videos_id'
    ];
}
