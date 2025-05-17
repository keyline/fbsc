
$(function () {
    const pusher = new Pusher($("#pusher_app_key").val(), {
        cluster: $("#pusher_cluster").val(),
        encrypted: true
    });

    var channel = pusher.subscribe('chat');

    let currentChatBox = null;

    // on click on any chat btn render the chat box
    $(".chat-toggle").on("click", function (e) {
        // alert('h')
        e.preventDefault();

        $(".chat-toggle").not(this).removeClass("shadow"); // Remove active class from all users
        $(this).addClass("shadow");

        let ele = $(this);

        let user_id = ele.attr("data-id");

        let username = ele.attr("data-user");

        $.ajax({
           url: '/user-business/mark-messages-as-read/' + user_id,
            method: 'POST',
             type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.state == 1) {
                    ele.find(".count").addClass("d-none");
                }
            },
            error: function (error) {
                console.error(error);
            }
        });

        // cloneChatBox(user_id, username, function () {
        //     let chatBox = $("#chat_box1_" + user_id);
        //     if (!chatBox.hasClass("chat-opened")) {
        //         chatBox.addClass("chat-opened").slideDown("fast");
        //         loadLatestMessages(chatBox, user_id);
        //         chatBox.find(".chat-area").animate({ scrollTop: chatBox.find(".chat-area").offset().top + chatBox.find(".chat-area").outerHeight(false) }, 800, 'swing');
        //     }
        // });


        if (currentChatBox !== null) {
            // Close the current chat box
            currentChatBox.slideUp("fast", function () {
                currentChatBox.removeClass("chat-opened");

                // $(".chat-toggle.active-user").removeClass("active-user");

                // Now, open the new chat box
                openChatBox(user_id, ele.attr("data-user"));
            });
        } else {
            // No chat box is open, so just open the new one
            openChatBox(user_id, username);
        }

    });

    function openChatBox(user_id, username) {
        cloneChatBox(user_id, username, function () {
            let chatBox = $("#chat_box1_" + user_id);

            if (!chatBox.hasClass("chat-opened")) {
                chatBox.addClass("chat-opened").slideDown("fast");


                loadLatestMessages(chatBox, user_id);

                chatBox.find(".chat-area").animate({
                    scrollTop: chatBox.find(".chat-area").offset().top + chatBox.find(".chat-area").outerHeight(true)
                }, 800, 'swing');
            }

            // Set the current chat box to this one
            currentChatBox = chatBox;
        });
    }

    // on close chat close the chat box but don't remove it from the dom
    $(".close-chat").on("click", function (e) {

        $(this).parents("div.chat-opened").removeClass("chat-opened").slideUp("fast");
    });



    /**
     * loaderHtml
     *
     * @returns {string}
     */
    function loaderHtml() {
        return '<i class="fa fa-refresh loader"></i>';
    }

    /**
     * getMessageSenderHtml
     *
     * this is the message template for the sender
     *
     * @param message
     * @returns {string}
     */
    function getMessageSenderHtml(message) {
        return `
        <li class="chat-right" data-message-id="${message.id}">
        <div class="chat-hour"
            datetime="${message.dateTimeStr}">
            • ${message.dateHumanReadable}<span class="fa fa-check-circle"></span></div>
        <div class="chat-text">
        ${message.message}
        </div>
 
    </li>
     `;
    }

    /**
     * getMessageReceiverHtml
     *
     * this is the message template for the receiver
     *
     * @param message
     * @returns {string}
     */
    function getMessageReceiverHtml(message) {
        return `
       <li class="chat-left" data-message-id="${message.id}">
       <div class="chat-text">
       ${message.message}
       </div>
       <div class="chat-hour"
           datetime="${message.dateTimeStr}">
           • ${message.dateHumanReadable}<span class="fa fa-check-circle"></span>
        </div>
   </li>
       `;
    }


    /**
     * cloneChatBox
     *
     * this helper function make a copy of the html chat box depending on receiver user
     * then append it to 'chat-overlay' div
     *
     * @param user_id
     * @param username
     * @param callback
     */
    function cloneChatBox(user_id, username, callback) {
        if ($("#chat_box1_" + user_id).length == 0) {

            let cloned = $("#chat_box1").clone(true);

            // change cloned box id
            cloned.attr("id", "chat_box1_" + user_id);

            cloned.find(".chat-user").text(username);

            cloned.find(".btn-chat").attr("data-to-user", user_id);

            cloned.find("#to_user_id").val(user_id);

            $("#chat-overlay").append(cloned);
        }

        callback();
    }

    /**
     * loadLatestMessages
     *
     * this function called on load to fetch the latest messages
     *
     * @param container
     * @param user_id
     */
    function loadLatestMessages(chatBox, user_id) {
        let chat_area = chatBox.find(".chat-area");

        chat_area.html("");

        $.ajax({
            url: "/user-business/load-latest-messages",
            data: { user_id: user_id, _token: $("meta[name='csrf-token']").attr("content") },
            method: "GET",
            dataType: "json",
            beforeSend: function () {
                if (chat_area.find(".loader").length == 0) {
                    chat_area.html(loaderHtml());
                }
            },
            success: function (response) {
                console.log(response)
                if (response.state == 1) {
                    response.messages.map(function (val, index) {
                        $(val).appendTo(chat_area);
                    });
                }
            },
            error: function (error) {
                console.error(error);
            },
            complete: function () {
                chat_area.find(".loader").remove();
            }
        });
    }

    // on change chat input text toggle the chat btn disabled state
    $(".chat_input").on("change keyup", function (e) {
        if ($(this).val() != "") {
            $(this).parents(".form-controls").find(".btn-chat").prop("disabled", false);
        } else {
            $(this).parents(".form-controls").find(".btn-chat").prop("disabled", true);
        }
    });
    // on click the btn send the message
    $(".btn-chat").on("click", function (e) {
        
        send($(this).attr('data-to-user'), $("#chat_box1_" + $(this).attr('data-to-user')).find(".chat_input").val());
        
    });
    // listen for the send event, this event will be triggered on click the send btn
    channel.bind('send', function (data) {
        displayMessage(data.data);
    });
    /**
    * send
    *
    * this function is the main function of chat as it send the message
    *
    * @param to_user
    * @param message
    */
   // Get the current scroll position before sending the message
    

    function send(to_user, message) {
        let chat_box = $("#chat_box1_" + to_user);
        let chat_area = chat_box.find(".chat-area");
        const currentScrollTop = chat_area.scrollTop();
        $.ajax({
            url: "/user-business/send",
            data: { to_user: to_user, message: message, _token: $("meta[name='csrf-token']").attr("content") },
            method: "POST",
            dataType: "json",
            beforeSend: function () {
                if (chat_area.find(".loader").length == 0) {
                    chat_area.append(loaderHtml());
                }
            },
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.error(error);
            },
            complete: function () {
                chat_area.find(".loader").remove();
                // chat_box.find(".btn-chat").prop("disabled", true);
                chat_box.find(".chat_input").val("");
                chat_area.scrollTop(currentScrollTop);
               // chat_area.animate({scrollTop: chat_area.offset().top + chat_area.outerHeight(false)}, 800, 'swing');
            }
        });
    }
    /**
    * This function called by the send event triggered from pusher to display the message
    *
    * @param message
    */
    function displayMessage(message) {
        let alert_sound = document.getElementById("chat-alert-sound");
        
        if ($("#current_user").val() == message.from_user_id) {
            let messageLine = getMessageSenderHtml(message);
            $("#chat_box1_" + message.to_user_id).find(".chat-area").append(messageLine);
        } else if ($("#current_user").val() == message.to_user_id) {
            // alert_sound.play();
            // for the receiver user check if the chat box is already opened otherwise open it
            cloneChatBox(message.from_user_id, message.fromUserName, function () {
                let chatBox = $("#chat_box1_" + message.from_user_id);
                if (!chatBox.hasClass("chat-opened")) {
                    chatBox.addClass("chat-opened").slideDown("fast");
                    loadLatestMessages(chatBox, message.from_user_id);
                   // chat_area.scrollTop(currentScrollTop);
                    // chatBox.find(".chat-area").animate({ scrollTop: chatBox.find(".chat-area").offset().top + chatBox.find(".chat-area").outerHeight(false) }, 800, 'swing');
                } else {
                    let messageLine = getMessageReceiverHtml(message);
                    // append the message for the receiver user
                    $("#chat_box1_" + message.from_user_id).find(".chat-area").append(messageLine);
                }
            });
        }
    }


    let lastScrollTop = 0;

    $(".chat-area").on("scroll", function (e) {
        let st = $(this).scrollTop();
        if (st < lastScrollTop) {
            fetchOldMessages($(this).parents(".chat-opened").find("#to_user_id").val(), $(this).find(".msg_container:first-child").attr("data-message-id"));
        }
        lastScrollTop = st;
    });
    // listen for the oldMsgs event, this event will be triggered on scroll top
    channel.bind('oldMsgs', function (data) {
        displayOldMessages(data);
    });

    function fetchOldMessages(to_user, old_message_id) {
        let chat_box = $("#chat_box1_" + to_user);
        let chat_area = chat_box.find(".chat-area");
        $.ajax({
            url: "/user-business/fetch-old-messages",
            data: { to_user: to_user, old_message_id: old_message_id, _token: $("meta[name='csrf-token']").attr("content") },
            method: "GET",
            dataType: "json",
            beforeSend: function () {
                if (chat_area.find(".loader").length == 0) {
                    chat_area.prepend(loaderHtml());
                }
            },
            success: function (response) {
            },
            complete: function () {
                chat_area.find(".loader").remove();
            }
        });
    }
    function displayOldMessages(data) {
        if (data.data.length > 0) {
            data.data.map(function (val, index) {
                $("#chat_box1_" + data.to_user).find(".chat-area").prepend(val);
            });
        }
    }

});