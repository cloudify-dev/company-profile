<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPage extends Model
{
    //
    use HasFactory;

    protected $table = 'blog_page';

    protected $fillable = [
        'breadcrumb_title',
        'breadcrumb_image',
    ];
}
