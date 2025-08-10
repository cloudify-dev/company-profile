<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'author',
        'title',
        'description',
        'image',
        'video',
        'blog_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function blogQuote()
    {
        return $this->hasOne(BlogQuote::class, 'blog_id', 'blog_id');
    }

    public function blogTags()
    {
        return $this->hasMany(BlogTag::class, 'blog_id', 'blog_id');
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'blog_id');
    }
}
