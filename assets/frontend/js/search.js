$(document).ready(function() {
    // Listen for form submit event
    $('#search-form2').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var industry = $('#industry').val();
        var search = $('#search2').val();

        // Make an AJAX request to the server
        $.ajax({
            url: '{{ route("business.search") }}',
            type: 'GET',
            data: {
                industry: industry,
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