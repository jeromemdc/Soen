
    <div class="col-md-1 ">
        <button type="button" data-toggle="modal" data-target="#media-modal" data-image-type="<?=$image_type?>" class="btn btn-sm btn-danger media-modal-toggle">
            <i class="fa fa-upload"></i>
            <span>Browse Image</span>
            <div class="preview-image-f"></div>
        </button>
    </div>

    <div class="col-md-2 img-preview col-md-offset-1 <?=$image_type?>" >
        <?php if (isset($current_image) && $current_image['filename'] !== ''): ?>
            <div class="product-img">
                <input type="hidden" name="<?=$image_type?>" value="<?=$current_image['filename']?>" id="current-image">
                <img src="<?=base_url().'uploads/img/'.$current_image['filename']?>" class="img-responsive" width="200">
                <a href="#" class="btn btn-xs btn-danger remove">
                <span class="glyphicon glyphicon-remove-sign"></span></a>
            </div>
        <?php else: ?>
            <div class="product-img">
                <img src="<?=base_url()?>includes/img/img-placeholder.png" class="img-responsive" width="200">
            </div>
        <?php endif; ?>
    </div>

    
