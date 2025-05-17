<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = [
        'uuid',
        'username',
        'first_name',
        'last_name',
        'email',
        'phone',
        'whatsapp',
        'address',
        'state',
        'city',
        'zipcode',
        'country',
        'profile_pic',
        'profile_cover_pic',
        'about',
        'highlight',
        'blood_group',
        'member_category',
        'committee',
        'status',
    ];

    // protected static function boot()
    // {
    //     parent::boot();
    //     self::creating(function($model){
    //         $model->uuid =  Str::uuid()->toString();
    //     });
    // }

}
