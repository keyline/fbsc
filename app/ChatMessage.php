<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';

    protected $fillable = ['sender_id', 'receiver_id', 'message',];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Define the receiver relationship
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // Create a new chat message
    public static function createMessage(User $sender, User $receiver, $message)
    {
        return self::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'message' => $message,
        ]);
    }

    // Retrieve messages between two users
    public static function getMessagesBetween(User $user1, User $user2)
    {
        return self::where(function ($query) use ($user1, $user2) {
            $query->where('sender_id', $user1->id)
                ->where('receiver_id', $user2->id);
        })
            ->orWhere(function ($query) use ($user1, $user2) {
                $query->where('sender_id', $user2->id)
                    ->where('receiver_id', $user1->id);
            })
            ->orderBy('created_at', 'asc')
            ->get();
    }


}