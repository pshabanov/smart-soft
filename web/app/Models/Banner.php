<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'position',
        'link',
        'image',
        'gradient_start',
        'gradient_end',
        'gradient_under_info',
        'active'
    ];
}
