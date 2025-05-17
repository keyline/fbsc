<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Row start -->
<div class="row no-gutters card mb-2 shadow bg-white" style="border-radius: 15px;">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <div class="card m-0" style="border-radius: 15px;">

            <!-- Row start -->
            <div class="row no-gutters" id="chat-overlay" style="border-radius: 15px;">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 card shadow bg-white" style="border-radius: 15px;">
                    <div class="users-container">
                        <div class="chat-search-box">
                            <div class="input-group">
                                <input class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if ($chat_users->count() > 0)
                            <ul id="users" class="users">
                                @foreach ($chat_users as $user)
                                    <li class="person chat-toggle" data-chat="person1" data-id="{{ $user->id }}"
                                        data-user="{{ $user->name }}">
                                        <div class="user">
                                            @if ($user->profile_pic)
                                                <img src="{{ asset($user->profile_pic) }}" alt="{{ $user->name }}">
                                                <span class="status busy"></span>
                                            @else
                                                <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                    alt="{{ $user->name }}">
                                                <span class="status busy"></span>
                                            @endif
                                            {{-- <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                alt="Retail Admin"> --}}

                                        </div>
                                        <p class="name-time">
                                            <span class="name">{{ $user->name }}</span>
                                            @if ($user->unread_messages_count > 0)
                                            <span class="count badge badge-pill badge-danger">
                                                {{ $user->unread_messages_count }}</span>
                                            @endif
                                    </li>
                                    </span>
                                    </p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No users found!</p>
                        @endif
                    </div>
                </div>

                {{-- chat ui --}}
                @include('frontend.user.business.chatBox')
                {{-- chat ui end --}}

            </div>
            <!-- Row end -->
        </div>

    </div>

    <!-- Content wrapper end -->
    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
</div>
<!-- Row end -->
