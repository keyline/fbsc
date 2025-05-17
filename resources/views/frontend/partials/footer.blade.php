@php
    $home_page_variant = $home_page ?? get_static_option('home_page_variant');
    $home_page19_color_con = $home_page_variant == '19' ? '' : 'footer-top';
@endphp
@if (!in_array(Route::currentRouteName(), ['frontend.course.lesson', 'frontend.course.lesson.start']))
    <footer
        class="footer-area home-variant-{{ $home_page_variant }}
@if (
    (request()->routeIs('homepage') || request()->routeIs('frontend.homepage.demo')) &&
        $home_page_variant == '17' &&
        filter_static_option_value('home_page_call_to_action_section_status', $static_field_data)) has-top-padding @endif
@if ($home_page_variant === '21') home-21 home-21-section-bg footer-color-five
 @elseif($home_page_variant == '19')
 footer-bg footer-color-three @endif
">
        @if (App\WidgetsBuilder\WidgetBuilderSetup::render_frontend_sidebar('footer', ['column' => true]))
            <div class="{{ $home_page19_color_con }} padding-top-90 padding-bottom-65">
                <div class="container">
                    <div class="row p-3">
                        {!! App\WidgetsBuilder\WidgetBuilderSetup::render_frontend_sidebar('footer', ['column' => true]) !!}
                    </div>
                </div>
            </div>
        @endif
        <div class="copyright-area copyright-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-item">
                            <div class="copyright-area-inner">
                                {!! get_footer_copyright_text() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="back-to-top">
        <span class="back-top">
            <i class="fas fa-angle-up"></i>
        </span>
    </div>

    {{-- @include('frontend.partials.popup-structure') --}}
@endif
<!-- load all script -->
<script>
    var base_url = '{{ url('/') }}';
</script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/dynamic-script.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jQuery.rProgressbar.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

<script src="{{ asset('assets/frontend/js/chat.js') }}"></script>

@if (\Route::currentRouteName() === 'frontend.products')
    <script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
@endif
<script src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>

{{-- search form start --}}
<script>
    $(document).ready(function() {
        // Listen for form submit event
        $('#search-form2').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var industry = $('#industry').val();
            var profession = $('#searchpProfession').val();
            var search = $('#search2').val();
            var url = $('#url').val();

            // Make an AJAX request to the server
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    industry: industry,
                    profession: profession,
                    search: search
                },
                success: function(response) {
                    // Update the search results container with the response
                    $('#search-business').html(response);
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>
{{-- search form end --}}

{{-- update business model start --}}
<script>
    $(document).ready(function() {
        $('.update-business-button').click(function() {

            // Get the business ID from the button's data attribute
            var businessId = $(this).data('id');
            var url = $(this).data('route');
            // Call the function to fetch business data
            getBusinessData(businessId, url);
        });
    });

    function getBusinessData(businessId, url) {
        $.ajax({
            url: url, // Replace with the actual URL
            type: 'GET',
            dataType: 'json', // Assuming the response is in JSON format
            success: function(response) {
                // alert(response.data)
                console.log(response)
                // Handle the successful response here
                // Update the modal fields with the retrieved data
                $('#updateBusinessId').val(response.id);
                $('#updateBusinessName').val(response.business_name);
                $('#updateDesignation').val(response.designation);
                $('#businessLogoPreview').val(response.business_logo);
                if (response.type === "business") {
                    $('#updateBusinessType').prop('checked', true);
                    $('#updateProfessionType').prop('checked', false);

                    document.getElementById('updateIndustryField').style.display = 'block';
                    document.getElementById('updateIndustry').required = true;
                    $('#updateIndustry').val(response.industry);
                    // document.getElementById('industry').addAttribute('required');
                    document.getElementById('updateProfessionField').style.display = 'none';
                    document.getElementById('updateProfession').removeAttribute('required');
                    

                } else if (response.type === "profession") {
                    $('#updateProfessionType').prop('checked', true);
                    $('#updateBusinessType').prop('checked', false);

                    document.getElementById('updateProfessionField').style.display = 'block';
                    document.getElementById('updateProfession').required = true;
                    $('#updateProfession').val(response.profession);
                    // document.getElementById('industry').addAttribute('required');
                    document.getElementById('updateIndustryField').style.display = 'none';
                    document.getElementById('updateIndustry').removeAttribute('required');
                } else {
                    // If 'type' is neither 'business' nor 'profession', you can set a default selection here
                    $('#updateBusinessType').prop('checked', true);
                    $('#updateProfessionType').prop('checked', false);
                    document.getElementById('updateIndustryField').style.display = 'block';
                    document.getElementById('updateIndustry').required = true;
                    $('#updateIndustry').val(response.industry);
                    // document.getElementById('industry').addAttribute('required');
                    document.getElementById('updateProfessionField').style.display = 'none';
                    document.getElementById('updateProfession').removeAttribute('required');
                }
              
                $('#updateMobileNumber').val(response.mobile_number);
                $('#updateEmail').val(response.email);
                $('#updateWebsite').val(response.website);
                $('#updateFacebook').val(response.facebook);
                $('#updateInstagram').val(response.instagram);
                $('#updateLinkedin').val(response.linkedin);
                $('#updateBusinessDescription').val(response.business_description);
                $('#updateSearchKeywords').val(response.search_keywords);
                // Add more fields as needed

                $('#updateModal').modal('show');
            },
            error: function() {
                // Handle the error here
                console.error('An error occurred while fetching business data.');
            }
        });
    }
</script>

<script>
    $('#updateBusinessForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        var businessId = $('#updateBusinessId').val();
        //var url = 

        // Add the _method field for PUT request
        formData.append('_method', 'PUT');

        $.ajax({
            url: '/user-home/business-update/' + businessId, // Replace with the actual URL
            type: 'POST', // Use POST method
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {

                $('#updateModal').modal('hide');
                // Check the message type (success or error) and display the message accordingly
                alert(response.message);
                // console.log(response.message)
                setTimeout(function() {
                    location.reload();
                }, 1000);

            },
            error: function() {
                // Handle the error here
                alert('An error occurred while updating business data.');
            }
        });
    });
</script>
{{-- update business model end --}}

{{-- business delete model star --}}
<script>
    $(document).ready(function() {
        var businessId;

        // Handle the click event on the delete button
        $('.delete-business').click(function() {
            businessId = $(this).data('business-id');
            $('#confirmationModal').modal('show');
        });

        // Handle the delete confirmation
        $('#confirmDelete').click(function() {
            $('#confirmationModal').modal('hide');
            deleteBusiness(businessId);
        });
    });

    function deleteBusiness(businessId) {
        $.ajax({
            url: '/user-home/business-delete/' + businessId, // Replace with the actual URL
            type: 'DELETE', // Use DELETE method
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                alert(response.message);

                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(error) {
                alert(error.message);
                // Handle the error here
                console.log(error)
                console.error('An error occurred while deleting the business.');
            }
        });
    }
</script>
{{-- business delete model end --}}

{{-- validation start --}}
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
{{-- validation end --}}

{{-- chat start --}}
<script>
    const sendButton = $('#send-button');
    const messageInput = $('#message-input');
    const receiverId = sendButton.data('receiver-id');
    const senderId = sendButton.data('sender-id');

    var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
        encrypted: true
    });

    var channel = pusher.subscribe('chat');

    // Function to add a new message to the chat interface
    function addMessageToChat(message, isSent) {
        const chatMessages = $('.chat-messages');
        const messageElement = $('<div class="message"></div>').addClass(isSent ? 'sent' : 'received').html(
            `<p>${message}</p>`);
        chatMessages.append(messageElement);
        // Optionally, you can scroll to the bottom to show the latest message
        // chatMessages.scrollTop(chatMessages.prop("scrollHeight"));
    }

    // Bind a handler for receiving messages through Pusher
    channel.bind('client-NewChatMessage', function(data) {
        const message = data.message;
        // Determine if it's a sent or received message based on sender_id
        const isSent = message.sender_id === {{ auth()->id() }};
        const isReceive = message.sender_id !== receiverId;
        addMessageToChat(message.message, isSent);

    });

    function sendMessageToServer(message) {
        // Make an AJAX POST request to your Laravel route
        $.ajax({
            method: 'POST',
            url: '/user-business/chat/send',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                message: message,
                receiver_id: receiverId,
            },
            success: function(response) {
                // Clear the input field after sending
                messageInput.val('');
            },
            error: function(error) {
                console.error(error);
            },
        });
    }

    sendButton.on('click', function() {
        const message = messageInput.val().trim();
        if (message === '') {
            return; // Don't send empty messages
        }

        // Broadcast the message in real-time using Pusher
        channel.trigger('client-NewChatMessage', {
            message: message
        });


        addMessageToChat(message, true);

        // Send the message to the server for storage
        sendMessageToServer(message);
    });
</script>
{{-- chat end --}}

<script>
    $(document).ready(function() {

        let currentBusiness = {
            name: '',
            logo: '',
        };
        // Set initial state based on the currently active tab
        setInitialTabState();

        // Listen for clicks on the "Connect" button
        $('.connect-btn').on('click', function() {
            // Get references to user and business elements
            var userPic = $('.message-tab-img');
            var businesspic = $('.message-tab-img1'); // Updated class
            var userName = $('.message-tab-header');
            var businessName = $('.message-tab-header1'); // Updated class
            var businessLogo = $('.message-tab-logo'); // Updated class

            // Get data from the "Connect" button's data attributes
            var businessNameData = $(this).data('business-name');
            var businessLogoData = $(this).data('business-logo');
            var userPicData = $(this).data('user-pic');

            setInitialTabState();

            userPic.toggle();
            userName.toggle();

            // Toggle visibility of business elements
            businesspic.toggle();
            businessName.toggle();

            // Update the current business information
            currentBusiness.name = businessNameData;
            currentBusiness.logo = businessLogoData;

            // Activate the "Messages" tab manually
            $('#messages-tab').tab('show');

            // Update the chat tab with the current business information
            updateChatTabWithBusinessInfo();
            $('#about-tab').removeClass('active');
            $('#about-tab').attr('aria-selected', 'false');

        });

        // Function to update the chat tab with the current business information
        function updateChatTabWithBusinessInfo() {
            $('.message-tab-header1').text('Send Message to ' + currentBusiness.name);
            $('.message-tab-logo').attr('src', currentBusiness.logo);
        }

        // Function to set the initial state of user and business elements based on the active tab
        function setInitialTabState() {
            var activeTabId = $('.header-menu-tab.active').attr('id');
            if (activeTabId === 'about-tab') {
                // Set initial state for the "About" tab
                $('.message-tab-img').show();
                $('.message-tab-header').show();
                $('.message-tab-img1').hide();
                $('.message-tab-header1').hide();
            } else if (activeTabId === 'messages-tab') {
                // Set initial state for the "Messages" tab
                $('.message-tab-img').show();
                $('.message-tab-header').show();
                $('.message-tab-img1').hide();
                $('.message-tab-header1').hide();
            }
        }

    });
</script>

<script>

    document.getElementById('businessType').addEventListener('change', function() {
        document.getElementById('industryField').style.display = 'block';
        document.getElementById('industry1').required = true;
        // document.getElementById('industry').addAttribute('required');
        document.getElementById('professionField').style.display = 'none';
        document.getElementById('profession').removeAttribute('required');
    });

    document.getElementById('professionType').addEventListener('change', function() {
         document.getElementById('industryField').style.display = 'none';
        //  document.getElementById('industry').required = false;
        document.getElementById('industry1').removeAttribute('required');
        document.getElementById('professionField').style.display = 'block';
        document.getElementById('profession').required = true;
    });
</script>

<script>

    document.getElementById('updateBusinessType').addEventListener('change', function() {
        document.getElementById('updateIndustryField').style.display = 'block';
        document.getElementById('updateIndustry').required = true;
        // document.getElementById('industry').addAttribute('required');
        document.getElementById('updateProfessionField').style.display = 'none';
        document.getElementById('updateProfession').removeAttribute('required');
    });

    document.getElementById('updateProfessionType').addEventListener('change', function() {
         document.getElementById('updateIndustryField').style.display = 'none';
         document.getElementById('updateIndustry').required = false;
        document.getElementById('updateIndustry').removeAttribute('required');
        document.getElementById('updateProfessionField').style.display = 'block';
        document.getElementById('updateProfession').required = true;
    });
</script>

<script>
     function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('ads_show').style.display = 'block';
        	$('#ads_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
        
</script>

{{-- business delete model star --}}
<script>
    $(document).ready(function() {
        var adsId;

        // Handle the click event on the delete button
        $('.delete-ads').click(function() {
            adsId = $(this).data('ad-id');
            $('#confirmationAdsModal').modal('show');
        });

        // Handle the delete confirmation
        $('#confirmAdsDelete').click(function() {
            $('#confirmationAdsModal').modal('hide');
            deleteAd(adsId);
        });
    });

    function deleteAd(adsId) {
        $.ajax({
            url: '/user-home/ads-delete/' + adsId, // Replace with the actual URL
            type: 'DELETE', // Use DELETE method
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                alert(response.message);

                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(error) {
                alert(error.message);
                // Handle the error here
                console.log(error)
                console.error('An error occurred while deleting the business.');
            }
        });
    }
</script>
{{-- business delete model end --}}

<script>
    $(document).ready(function() {
        $("#member_business").submit(function (e) {
        formData = new FormData(this);
       
        e.preventDefault(); 
        var url = document.getElementById('url');
      //  alert(url)
        $.ajax({
            url: "/member-store-business",
            method: "POST",
            data: formData, 
            contentType: false, 
            processData: false, 
            success: function (response) {
                alert("Business added successfully");
                // Show the confirmation modal
                $("#confirmation_addModal").modal("show");

                // Handle "Yes" button click
                $("#confirmYes").click(function () {
                    // If the user clicks "Yes," clear the form
                    $("#member_business")[0].reset();

                    // Close the confirmation modal
                    $("#confirmation_addModal").modal("hide");
                });

                // Handle "No" button click
                $("#confirmNo").click(function () {
                    // If the user clicks "No," redirect to the home page
                    window.location.href = "/"; // Replace with your home page URL
                });
            },
            error: function (xhr) {
                // Handle errors here
                console.log(xhr.responseText);
            },
        });
    });
});

</script>

<script>
    $(document).ready(function() {
        let cropper;

        // Initialize Cropper.js after the image is loaded
        $('#profile_pic').change(function() {
            const file = this.files[0];
            const image = document.getElementById('profile_pic_preview');

            if (cropper) {
                cropper.destroy();
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;

                // Initialize Cropper.js after the image is loaded
                cropper = new Cropper(image, {
                    aspectRatio: 1, // You can adjust the aspect ratio as needed
                    viewMode: 1,
                    autoCropArea: 1,
                    crop: function(e) {
                        const canvas = cropper.getCroppedCanvas();
                        // document.getElementById('cropped_profile_pic').value = canvas
                        //     .toDataURL('image/jpeg');
                        $('#crop-and-save-container').show();
                    }
                });
            };

            reader.readAsDataURL(file);
        });

        // Handle Crop & Save button click
        $('#crop-and-save').click(function() {
            if (cropper) {
                cropper.getCroppedCanvas().toBlob(function(blob) {
                    const formData = new FormData();
                    formData.append('profile_pic', blob, 'profile_pic.jpg');

                    // Send the cropped image to the server using AJAX
                    $.ajax({
                        url: '/upload-cropped-image', // Update the URL to your Laravel route
                        method: 'POST',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Handle the response from the server (e.g., success message)
                            console.log(response);
                            console.log(response.path);
                            $('#cropped_profile_pic').val(response.path);
                            $('#upload-success-message').show();
                            $('#profile_pic_preview').attr('src', response.path)
                                .show();
                                $('#crop-and-save-container').hide();
                           // document.getElementById('cropped_profile_pic').value = response.data.path;
                            // $('#cropped_profile_pic').val(response.data.path);
                          //  document.getElementById('cropped_profile_pic').val(response.data.path);
                        },
                        error: function(error) {
                            // Handle errors
                            console.error(error);
                        }
                    });
                });
            }
        });
        
         // Handle Crop & Save button click
         $('#crop-and-save2').click(function() {
            if (cropper) {
                $('#loader').show();
                cropper.getCroppedCanvas().toBlob(function(blob) {
                    const formData = new FormData();
                    formData.append('profile_pic', blob, 'profile_pic.jpg');

                    // Send the cropped image to the server using AJAX
                    $.ajax({
                        url: '/upload-cropped-profile', // Update the URL to your Laravel route
                        method: 'POST',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Handle the response from the server (e.g., success message)
                             $('#loader').hide();
                            console.log(response);
                            console.log(response.path);
                            $('#cropped_profile').val(response.path);
                            $('#upload-success-message').show();
                            $('#profile_pic_preview').attr('src', response.path)
                                .show();
                            $('#crop-and-save-container').hide();
                            // document.getElementById('cropped_profile_pic').value = response.data.path;
                            // $('#cropped_profile_pic').val(response.data.path);
                            //  document.getElementById('cropped_profile_pic').val(response.data.path);
                        },
                        error: function(error) {
                            // Handle errors
                             $('#loader').hide();
                            console.error(error);
                        }
                    });
                });
            }
        });
        
    });
</script>

<script>
    $(document).ready(function() {
    $('#username').on('input', function() {
        const username = $(this).val();
        const usernameAvailability = $('#username-availability');

        // Perform an AJAX request to check username availability
        $.ajax({
            url: '/check-username-availability', // Update the URL to your Laravel route
            method: 'POST',
            data: { username: username },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.available) {
                    usernameAvailability.text('Username is available').css('color', 'green');
                } else {
                    usernameAvailability.text('Username is not available').css('color', 'red');
                }
            },
            error: function(error) {
                // Handle errors
                console.error(error);
            }
        });
    });
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000, // Adjust the speed as needed
            arrows: true, // Set to true if you want navigation arrows
            dots: true // Set to true if you want pagination dots
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Handle alphabet filter click event
        $('.alphabet-box').on('click', function () {
            const selectedAlphabet = $(this).data('alphabet'); // Get the selected alphabet

            // Make an AJAX request to fetch members by selected alphabet
            $.ajax({
                url: '/user-home/filter-by-alphabet',
                type: 'GET',
                data: { alphabet: selectedAlphabet },
                success: function (data) {
                    // Replace the content of the member-list with filtered results
                    // console.log(data)
                    $('.member-list').html(data);
                },
                
                error: function (error) {
                    console.error('AJAX request failed:', error);
                }
            });
        });

        // Handle search button click
        $('#search-button').on('click', function () {
            const searchTerm = $('#name-search').val();
            performNameSearch(searchTerm);
        });

        // Function to perform name search
        function performNameSearch(searchTerm) {
            $.ajax({
                url: '/user-home/search-by-name',
                type: 'GET',
                data: { searchTerm: searchTerm },
                success: function (data) {
                    // Replace the content of the member-list with search results
                    $('.member-list').html(data);
                },
                error: function (error) {
                    console.error('AJAX request failed:', error);
                }
            });
        }

    });
</script>

<x-frontend.others.advertisement-script />
@if (request()->routeIs('homepage') || request()->routeIs('frontend.homepage.demo'))
    @include('frontend.partials.popup-jspart')
    @include('frontend.partials.gdpr-cookie')
@endif

@include('frontend.partials.twakto')
@include('frontend.partials.google-captcha')
@include('frontend.partials.inline-script')
@include('frontend.partials.product-ajax-js')
@yield('scripts')

</body>

</html>
