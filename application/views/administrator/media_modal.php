<!-- media modal... -->
<div id="media-modal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4>Media Manager</h4>
			</div>

			<div class="modal-body">
				<!-- nav tabs -->
				<ul class="nav nav-tabs" id="myTabs">
					<li class="active"><a href="#upload" data-toggle="tab">Upload</a></li>
					<li><a href="#library" data-toggle="tab">Library</a></li>
				</ul>

				<!-- tab panes -->
				<div class="tab-content clearfix">
					<div class="tab-pane active fade in" id="upload">
						<!-- Start Form Upload -->
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <form action="<?php echo base_url(); ?>administrator/do_upload" class="image-form form-horizontal" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                    
                                        <div class="col-md-6 fileupload">
                                            <span class="btn btn-success fileinput-button">
                                                <i class="fa fa-upload"></i>
                                                <span>Browse Image</span>
                                                <input type="file" accept = "image/*" class = "form-control file-select" name="uploadfile" id="img-select"/><br />
                                            </span>
                                        </div>

                                       

                                        <div id="img-container" class="img-preview pull-left media-img">
                                            <img src="<?php echo base_url()?>includes/img/img-placeholder.png" class="img-responsive">
                                        </div>


                                    </div>
                                </form>
						    </div>
					    </div>
					    <!-- End Form Upload -->
					    <button class="btn btn-info insert-uploaded">Insert Uploaded File</button>
				    </div>

				    <!-- library tab -->
				    <div class="tab-pane fade" id="library">
					    <button type="button" class="btn btn-sm btn-info insert">Insert</button>
				        <div class="clearfix"></div>
                        <div class="media-gallery">
                            <?php 
                                $uploads = 'uploads/img/';
                                $items = glob($uploads.'{*.gif,*.jpg,*.png}', GLOB_BRACE);

                                foreach($items as $filename): 
                                        if(strpos($filename, '_500px') === FALSE && strpos($filename, '_300px') === FALSE): ?>
                                            <div class="gallery-item">
                                                <a href="#" data-image-filename="<?php echo basename($filename)?>" class="media-content">
                                                    <img src="<?php echo base_url().$uploads.basename($filename)?>" alt="<?=$filename?>" width="100" height="auto">
                                                    <input type="radio" name="images-radio" class="images-radio">
                                                </a>
                                            </div>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </div>

                        <ul class="pagination">
                            <?php $pages = count($items) / 25; 
                            for($i = 1; $i <= ceil($pages); $i++): ?>
                            <li class="<?php echo $i == 1 ? 'active' : '' ?>"><a href="#" class="page"><?=$i?></a></li>
                        <?php endfor; ?>
                        </ul>
			            <div class="clearfix"></div>
			             <!-- insert button -->
			            <button type="button" class="btn btn-sm btn-info insert">Insert</button>
		            </div><!-- end .library -->
	            </div><!-- end tab-content -->
            </div>

        </div><!-- end .modal-content -->
    </div><!-- end .modal-dialog -->
</div><!-- end .modal -->