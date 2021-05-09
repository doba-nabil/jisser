<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
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

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Categories_subcategory', 'subcategory_id');
    }

    public function segment()
    {
        return $this->belongsTo('App\Models\Categories_segment', 'segment_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Services_comment')->orderBy('id', 'desc');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Services_image')->orderBy('id', 'desc');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Services_package')->orderBy('order', 'asc');
    }

    public function faqs()
    {
        return $this->hasMany('App\Models\Services_faq')->orderBy('id', 'desc');
    }

    public function arabicTags()
    {
        return $this->hasMany('App\Models\Services_tag')->where('language', 'ar');
    }

    public function englishTags()
    {
        return $this->hasMany('App\Models\Services_tag')->where('language', 'en');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Services_offer')->orderBy('id', 'desc');
    }

    public static function price($serviceID)
    {
        $firstPackage =  Services_package::where('service_id', $serviceID)->orderBy('order', 'asc')->first();
        if ($firstPackage) {
            return $firstPackage->price;
        } else {
            return 0;
        }
    }
}
