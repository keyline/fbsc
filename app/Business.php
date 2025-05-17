<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table ='businesses';

    protected $fillable = [
        'user_id',
        'business_name',
        'designation',
        'business_logo',
        'type',
        'industry',
        'profession',
        'mobile_number',
        'email',
        'website',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'business_description',
        'search_keywords'
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor method to get the keywords as an array
    public function getSearchKeywordsAttribute()
    {
        return explode(',', $this->attributes['search_keywords']);
    }

    // Mutator method to set the keywords as a comma-separated string
    public function setSearchKeywordsAttribute($value)
    {
        $this->attributes['search_keywords'] = implode(',', $value);
    }
}
