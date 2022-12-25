<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = [
        'title',
        'image',
        'slogan',
    ];

   
}
