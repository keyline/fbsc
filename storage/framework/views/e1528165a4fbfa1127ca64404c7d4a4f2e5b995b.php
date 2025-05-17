<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('members_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('members_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('testimonial_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('testimonial_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <?php echo render_og_meta_image_by_attachment_id(get_static_option('testimonial_page_'.$user_select_lang_slug.'_meta_image')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="testimonial-area bg-image padding-top-110 padding-bottom-40">
        <div class="container">
            <div class="row">                                                        
                <div class="col-lg-12">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            
                            <h4 class="title"><?php echo e(__('All Members')); ?></h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th><?php echo e(__('#')); ?></th>
                                        <th><?php echo e(__('Name')); ?></th>
                                        <th><?php echo e(__('Business Name')); ?></th>                                    
                                        <th><?php echo e(__('Business Category')); ?></th>                                    
                                        <!-- <th><?php echo e(__('Action')); ?></th>
                                        <th><?php echo e(__('Change Status to')); ?></th> -->
                                    </thead>
                                    <tbody>
                                        <?php
                                            $startNumber = ($membersData->currentPage() - 1) * $membersData->perPage() + 1;
                                        ?>
                                        <?php $__currentLoopData = $membersData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($startNumber++); ?></td>
                                                <td><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?> 
                                                    <?php if(!empty($data->designation)): ?>
                                                        <span>(<?php echo e($data->designation); ?>)</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($data->business_name); ?></td>                                            
                                                <td><?php echo e($data->business_category); ?></td>                                                        
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo e($membersData->links()); ?>

                        </div>
                    </div>
                </div>                                                    
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fbsc\resources\views/frontend/pages/members-page.blade.php ENDPATH**/ ?>