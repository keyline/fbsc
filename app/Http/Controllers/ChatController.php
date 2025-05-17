<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Broadcast;
use App\Events\ChatMessageEvent;
use App\ChatMessage;
use Pusher\Pusher;
use App\User;
use App\Lib\PusherFactory;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getLoadLatestMessages(Request $request)
    {
        if (!$request->user_id) {
            return;
        }
        $messages = ChatMessage::where(function ($query) use ($request) {
            $query->where('sender_id', Auth::user()->id)->where('receiver_id', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('sender_id', $request->user_id)->where('receiver_id', Auth::user()->id);
        })->orderBy('created_at', 'ASC')->limit(10)->get();
        $return = [];
        foreach ($messages as $message) {
            $return[] = view('frontend.user.business.message-line')->with('message', $message)->render();
        }
        return response()->json(['state' => 1, 'messages' => $return]);
    }


    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|integer',
        ]);

        $user = Auth::user();

        $message = new ChatMessage();
        $message->sender_id = $user->id;
        $message->receiver_id = $validatedData['receiver_id'];
        $message->message = $validatedData['message'];
        $message->save();

        // $message->sender_id = Auth::user()->id;
        // $message->message = $$request->message;
        // $message->receiver_id = $request->receiver_id;

        $pusher = new Pusher(
            env("PUSHER_APP_KEY"),
            env("PUSHER_APP_SECRET"),
            env("PUSHER_APP_ID"),
            array(
                'cluster' => env("PUSHER_APP_CLUSTER"),
                'encrypted' => true,
            )
        );

        $pusher->trigger('chat', 'client-NewChatMessage', [Auth::user()->id, $message]);

        //  broadcast(new ChatMessageEvent(Auth::user()->id, $message))->toOthers();

        return response()->json(['status' => 'Message sent']);
    }

    public function postSendMessage(Request $request)
    {
        if (!$request->to_user || !$request->message) {
            return;
        }
        $message = new ChatMessage();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->to_user;
        $message->message = $request->message;
        $message->save();
        // prepare some data to send with the response
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));
        $message->dateHumanReadable = $message->created_at->diffForHumans();
        // $message->fromUserName = $message->fromUser->name;
        $message->from_user_id = Auth::user()->id;
        // $message->toUserName = $message->toUser->name;
        $message->to_user_id = $request->to_user;

        $pusher = new Pusher(
            env("PUSHER_APP_KEY"),
            env("PUSHER_APP_SECRET"),
            env("PUSHER_APP_ID"),
            array(
                'cluster' => env("PUSHER_APP_CLUSTER"),
                'encrypted' => true,
            )
        );

        $pusher->trigger('chat', 'send', ['data' => $message]);

        return response()->json(['state' => 1, 'data' => $message]);
    }

    public function getOldMessages(Request $request)
    {
        if (!$request->old_message_id || !$request->to_user)
            return;

        $message = ChatMessage::find($request->old_message_id);

        $lastMessages = ChatMessage::where(function ($query) use ($request, $message) {
            $query->where('sender_id', Auth::user()->id)
                ->where('receiver_id', $request->to_user)
                ->where('created_at', '<', $message->created_at);
        })
            ->orWhere(function ($query) use ($request, $message) {
                $query->where('sender_id', $request->to_user)
                    ->where('receiver_id', Auth::user()->id)
                    ->where('created_at', '<', $message->created_at);
            })
            ->orderBy('created_at', 'ASC')->limit(10)->get();
        $return = [];
        $pusher = new Pusher(
            env("PUSHER_APP_KEY"),
            // public key
            env("PUSHER_APP_SECRET"),
            // Secret
            env("PUSHER_APP_ID"),
            // App_id
            array(
                'cluster' => env("PUSHER_APP_CLUSTER"),
                // Cluster
                'encrypted' => true,
            )
        );
        if ($lastMessages->count() > 0) {
            foreach ($lastMessages as $message) {
                $return[] = view('frontend.user.business.message-line')->with('message', $message)->render();
            }

            $pusher->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
        }
        return response()->json(['state' => 1, 'data' => $return]);
    }

    public function markMessagesAsRead(Request $request, $user)
    {
        $currentUserId = auth()->user()->id;

        // Update the is_read status of messages where the sender is the other user
        ChatMessage::where('sender_id', $user)
            ->where('receiver_id', $currentUserId)
            ->update(['is_read' => true]);

        return response()->json(['state' => 1, 'status' => 'Messages marked as read']);
    }


}