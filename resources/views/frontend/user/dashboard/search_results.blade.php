@if ($results->count() > 0)
<div class="row bootstrap snippets bootdeys mb-5">
    @foreach ($results as $member)
        <div class="col-md-3 col-sm-3">
            <div class="member-entry" >
                @if ($member->profile_pic)
                    <a href="#" class="member-img">
                        <img src="{{ asset($member->profile_pic) }}"
                            style="width: 50px; height: 50px; border-radius: 10px;" class="img-rounded">
                    </a>
                @else
                    <a href="#" class="member-img">
                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                            style="width: 50px; height: 50px; border-radius: 10px;" class="img-rounded">
                    </a>
                @endif

                <div class="member-details">
                    <h6>{{ $member->first_name }} {{ $member->last_name }}</h6>
                    <div class="row info-list"> 
                   
                    <div class="col-sm-12"> 
                        <a href="#">{{ $member->phone }}</a> 
                    </div>
                    <div class="col-sm-12 email-text" title="{{ strtolower($member->email) }}" > 
                        <a href="#">{{ strtolower($member->email) }}</a> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
<div class="row bootstrap snippets bootdeys mb-5">
    <div class="col-md-12 col-sm-12" style="display: flex; justify-content: center; align-items: center;">
        <h6>No members found for this search.</h6>
    </div>
   
</div>
@endif
