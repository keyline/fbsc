<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category',
        'short_description', 
        'created_by',
        'banner', 
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
