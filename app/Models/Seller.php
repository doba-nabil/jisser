<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\Sellers_language');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\Sellers_skill');
    }

    public function occupations()
    {
        return $this->hasMany('App\Models\Sellers_occupation');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\Sellers_education');
    }

    public function certifications()
    {
        return $this->hasMany('App\Models\Sellers_certification');
    }
}
