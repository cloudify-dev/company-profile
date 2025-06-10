<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'icon',
        'title',
        'description',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
