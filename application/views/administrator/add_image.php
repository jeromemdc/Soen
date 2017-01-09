<style>
    .DTTT_container{ display:none; }
</style>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Form Stuff</a></li>
        <li class="active"><?=$title?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?=$title?> </h1>
    <!-- end page-header -->

    <?php if($this->session->flashdata('saved')): ?>
        <div class="alert alert-success fade in pull-left">
            <strong>Success!</strong>
            <?=$this->session->flashdata('saved')?>
            <span class="close m-l-10" data-dismiss="alert">×</span>
        </div>
    <?php endif; ?>
    
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Form Elements</h4>
                </div>
                <div class="panel-body">
     
                    <form action="<?=base_url().'administrator/add_image/'.$result->pid.'?route=catalog'?>" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured Image</label>
                            <img class="img-responsive" src="<?=base_url().'uploads/img/'.$result->image?>" alt="" width="200">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Name <code>*</code></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="<?=$result->name?>" readonly/>
                                <input type="hidden" class="form-control" name="pid" value="<?=$result->pid?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <?php $this->load->view('administrator/media_btn', array('image_type' => 'image')); ?>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-sm btn-success" >Submit Button</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="images" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-products">
                                    <?php 
                                        if($images): $i = 0;
                                        
                                            foreach($images as $row): $i++;
                                            ?>
                                            <tr data-position="<?=$row->sorting?>" class="odd gradeX" id="<?=$row->prod_img_id?>">
                                                <input type="hidden" name="tablename" id="tablename" value="products_image">
                                                <input type="hidden" name="idname" id="idname" value="prod_img_id">
                                                <td><?=$row->sorting?></td>
                                                <td class="text-center"><img src="<?=base_url().'uploads/img/'.$row->image?>" alt="" class="" width="100"></td>
                                                <td class="text-right">
                                                    <a class="btn btn-danger delete" href="<?=base_url().'administrator/delete_image/'.$row->prod_img_id.'?route=catalog'?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr id="no-record" class="odd gradeX">
                                                <td>No Record</td>
                                                <td>No Record</td>
                                            </tr>
                                        <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>
            </div>
            <!-- end panel -->
        <!-- end col-6 -->
        </div>
    </div>
</div>