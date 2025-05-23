<?php
    $home_page_variant = $home_page ?? filter_static_option_value('home_page_variant', $global_static_field_data);
?>
<!DOCTYPE html>
<html lang="<?php echo e($user_select_lang_slug); ?>" dir="<?php echo e(get_user_lang_direction()); ?>">

<head>
    <?php if(!empty(filter_static_option_value('site_google_analytics', $global_static_field_data))): ?>
        <?php echo get_static_option('site_google_analytics'); ?>

    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo render_favicon_by_id(filter_static_option_value('site_favicon', $global_static_field_data)); ?>

    <?php echo load_google_fonts(); ?>

    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <link rel=preload href="<?php echo e(asset('assets/frontend/css/fontawesome.min.css')); ?>" as="style">
    <link rel=preload href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>" as="style">
    <link rel=preload href="<?php echo e(asset('assets/frontend/css/nexicon.css')); ?>" as="style">

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/nexicon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style-two.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/helpers.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery.ihavecookies.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/dynamic-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/chat.css')); ?>" />
    <link href="<?php echo e(asset('assets/frontend/css/jquery.mb.YTPlayer.min.css')); ?>" media="all" rel="stylesheet"
        type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <style>
        #crop-and-save-container {
            display: none;
        }
    </style>
    
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


    <?php if(!empty(get_static_option('google_adsense_publisher_id'))): ?>
        <script rel="preload" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo e(get_static_option('google_adsense_publisher_id')); ?>"
            crossorigin="anonymous"></script>
    <?php endif; ?>


    <?php if(file_exists('assets/frontend/css/home-' . $home_page_variant . '.css') &&
            empty(get_static_option('home_page_page_builder_status'))): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/home-' . $home_page_variant . '.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('frontend.partials.css-variable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.navbar-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>
    <?php if(
        !empty(filter_static_option_value('site_rtl_enabled', $global_static_field_data)) ||
            get_user_lang_direction() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/rtl.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/new_rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('frontend.partials.og-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/frontend/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/jquery-migrate-3.1.0.min.js')); ?>"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <style>
        .message.sent {
            /* background-color: #3490dc;  */
            color: #3490dc;
            /* Adjust as needed */
            text-align: right;
        }

        /* Receiver Message Styles */
        .message.received {
            /* background-color: #e2e8f0; */
            color: #333;
            /* Adjust as needed */
            text-align: left;
        }

        .message-timestamp {
            font-size: 12px;
            /* Adjust as needed */
            color: #777;
            /* Adjust as needed */
            margin-bottom: 5px;
            margin-top: 1px
                /* Adjust as needed */
        }

        .glyphicon-ok {
            color: #42b7dd;
        }

        .loader {
            -webkit-animation: spin 1000ms infinite linear;
            animation: spin 1000ms infinite linear;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
        }
    </style>

    <script>
        var siteurl = "<?php echo e(url('/')); ?>";
    </script>

    <?php echo filter_static_option_value('site_third_party_tracking_code', $global_static_field_data); ?>


</head>

<body
    class="<?php echo e(request()->path()); ?> home_variant_<?php echo e($home_page_variant); ?> nexelit_version_<?php echo e(getenv('XGENIOUS_NEXELIT_VERSION')); ?> <?php echo e(filter_static_option_value('item_license_status', $global_static_field_data)); ?> apps_key_<?php echo e(filter_static_option_value('site_script_unique_key', $global_static_field_data)); ?> ">
    <?php echo $__env->make('frontend.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.search-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php if(!empty(get_static_option('navbar_variant')) && !in_array(get_static_option('navbar_variant'), ['03', '05'])): ?>
        <?php echo $__env->make('frontend.partials.supportbar', ['home_page_variant' => $home_page_variant], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php /**PATH /home/u235913067/domains/fbsc.in/public_html/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>