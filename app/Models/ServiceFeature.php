<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'text',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
