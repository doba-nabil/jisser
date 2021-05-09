<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services_offer extends Model
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

    public function requester()
    {
        return $this->belongsTo('App\Models\User', 'requester_id');
    }

    public function service_id()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
