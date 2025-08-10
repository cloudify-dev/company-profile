<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogQuote extends Model
{
    //
    protected $primaryKey = 'quote_id';
    protected $fillable = [
        'blog_id',
        'text',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
