<!-- Cover Photo -->
<div class="cover-photo">
    <img src="{{ asset($user_details->profile_cover_pic) }}" alt="Cover Photo">

    <!-- Profile Picture -->
    <div class="profile-section">
        <div class="profile-picture">
            <img src="{{ asset($user_details->profile_pic) }}" alt="Profile Picture">
        </div>
        <!-- User Information -->
 <div class="user-info">
    <h1>{{ $user_details->name }}</h1>
    <!-- Add more user information here -->
</div>
    </div>
     
</div>
 
