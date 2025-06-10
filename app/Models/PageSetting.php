<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $fillable = ['page_name', 'breadcrumb_title', 'breadcrumb_image'];
}
