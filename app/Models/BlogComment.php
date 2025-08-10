<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    //
    use HasFactory;
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'blog_id',
        'comment',
        'email',
        'name',
        'website'
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
