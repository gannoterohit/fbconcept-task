<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'post_image';
    protected $guarded = []; 
    protected $fillable = [
        'user_id',
        'image',
        'like_count',
    ];
}
