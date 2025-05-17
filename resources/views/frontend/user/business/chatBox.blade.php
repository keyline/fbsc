
<div id="chat_box1" class="col-xl-8 col-lg-8 col-md-8 col-sm-12" style="display: none">
    <div class="selected-user shadow bg-white">
        <span>To: <span class="name chat-user"></span></span>
    </div>
    <div class="chat-container">
        <div class="panel-body chat-area">
        </div>

        <div class="form-group mt-3 mb-0">
            {{-- <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea> --}}
           
                <div class="input-group">
                    <input type="text" placeholder="Type a message" aria-describedby="button-addon2"
                        class="form-control rounded border-1 py-4 chat_input">
                    <div class="input-group-append">
                        <button id="button-addon2" class="btn btn-primary btn-chat" data-to-user=""> <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
           
            <input type="hidden" id="to_user_id" value="" />
        </div>
    </div>
</div>