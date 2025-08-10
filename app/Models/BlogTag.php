<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogTag extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'tag_id';

    protected $fillable = [
        'blog_id',
        'tag_name',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
