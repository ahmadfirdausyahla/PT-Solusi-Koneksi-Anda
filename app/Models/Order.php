<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'service_id', 'name', 'email', 'phone', 'notes', 'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}