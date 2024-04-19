<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'post_title',
        'post_content',
        'post_category',
        'author',
        'published_at'
    ];
    
    use HasFactory;
}
