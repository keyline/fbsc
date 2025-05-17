<div class="chat-container">
    <ul class="chat-box chatContainerScroll">
        @if ($message->sender_id == \Auth::user()->id)
            <li class="chat-right msg_container" data-message-id="{{ $message->id }}">
                <div class="chat-hour"
                    datetime="{{ date('Y-m-dTH:i', strtotime($message->created_at->toDateTimeString())) }}">
                    {{-- {{ $message->sender_id->name }} --}}
                    • {{ $message->created_at->diffForHumans() }}<span class="fa fa-check-circle"></span></div>
                <div class="chat-text">
                    {!! $message->message !!}
                </div>

            </li>
        @else
            <li class="chat-left msg_container" data-message-id="{{ $message->id }}">

                <div class="chat-text">
                    {!! $message->message !!}
                </div>
                <div class="chat-hour"
                    datetime="{{ date('Y-m-dTH:i', strtotime($message->created_at->toDateTimeString())) }}">
                    {{-- {{ $message->sender_id->name }} --}}
                    • {{ $message->created_at->diffForHumans() }} <span class="fa fa-check-circle"></span></div>
            </li>
        @endif
    </ul>

</div>
