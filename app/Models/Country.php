<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany('App\Models\Countries_city')->orderBy('id', 'desc');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User')->orderBy('id', 'desc');
    }
}
