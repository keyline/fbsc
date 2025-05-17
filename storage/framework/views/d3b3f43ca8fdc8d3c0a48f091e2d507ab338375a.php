<div class="single-what-we-cover-item-02 margin-bottom-30">
    <div class="single-what-img">
        <?php echo render_image_markup_by_attachment_id($service->image); ?>

    </div>
    
    <div class="content">
        <a href="<?php echo e(route('frontend.services.single',$service->slug)); ?>"><h4 class="title"><?php echo e($service->title); ?></h4></a>
        <p><?php echo e($service->excerpt); ?></p>
    </div>
</div><?php /**PATH /home/fbscin/public_html/resources/views/components/frontend/service/grid.blade.php ENDPATH**/ ?>