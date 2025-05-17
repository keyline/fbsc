<div class="container-fluid">
    <h4>Search Results</h4>
    @if (count($search_businesses) > 0)

        <div class="row">
            @foreach ($search_businesses as $business)
            
                @foreach ($users as $user)
                    @if ($user->id == $business->user_id)
                        <div class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">

                            <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                <div class="card-body p-4">
                                    <div class="d-flex text-black justify-content-center align-items-center">
                                        <div class="flex-shrink-0 p-2">
                                            @if ($business->business_logo)
                                                <img class="img-fluid"
                                                    style="width: 150px;height:150px; border-radius: 10px;"
                                                    src="{{ asset($business->business_logo) }}"alt="Business Logo">
                                            @else
                                                <img class="img-fluid"
                                                    style="width: 150px;height:150px; border-radius: 10px;"
                                                    src="{{ asset('assets/frontend/banner/image-not-found-coverpic.png') }}"
                                                    alt="Business Logo">
                                            @endif
                                                
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-1">{{ $business->business_name }}</h5>
                                            <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->name }} ( {{ $business->designation }} )</p>
                                           
                                            <div class="d-flex pt-1">
                                                
                                                <button type="button"
                                                    class="btn btn-outline-primary me-1 flex-grow-1"><a href="{{ route('user.userProfile',$user->id) }}">View Profile</a></button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    @else
        <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
            <div class="card-body" style="position: relative;">
                <h6> No matches found. Try another keywords</h6>
            </div>
        </div>
    @endif
</div>
