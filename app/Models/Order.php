<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Services_package');
    }
}
