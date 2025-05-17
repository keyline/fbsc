<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\ChatMessage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified','email_verify_token','phone','address','state','city','zipcode','country','username',
        'profile_pic','profile_cover_pic','profession','about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businesses()
   {
       return $this->hasMany(Business::class);
   }

   public function sendMessageTo(User $receiver, $message)
    {
        $chatMessage = ChatMessage::create([
            'sender_id' => $this->id,
            'receiver_id' => $receiver->id,
            'message' => $message,
        ]);

        return $chatMessage;
    }
    
     protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
