<?php $id = isset($id) ? $id : null; ?>
<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e(__($title)); ?></label>
    <?php $signature_image_upload_btn_label = __('Upload Image'); ?>
    <div class="media-upload-btn-wrapper">
        <div class="img-wrap">
            <?php
                if (is_null($id)){
                    $id = get_static_option($name);
                }
                $signature_img = get_attachment_image_by_id($id,null,false);
            ?>
            <?php if(!empty($signature_img)): ?>
                <div class="rmv-span"><i class="fas fa-trash"></i></div>
                <div class="attachment-preview">
                    <div class="thumbnail">
                        <div class="centered">
                            <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                        </div>
                    </div>
                </div>
                <?php $signature_image_upload_btn_label = __('Change Image'); ?>
            <?php endif; ?>
        </div>
        <br>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($id); ?>">
        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($id ?? ''); ?>" data-toggle="modal" data-target="#media_upload_modal">
            <?php echo e(__($signature_image_upload_btn_label)); ?>

        </button>
    </div>
    <small><?php echo e(__('recommended image size is')); ?> <?php echo e($dimentions ?? ''); ?></small>
</div><?php /**PATH /home/u235913067/domains/fbsc.in/public_html/resources/views/components/media-upload.blade.php ENDPATH**/ ?>