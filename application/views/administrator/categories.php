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

                <div class="panel-body" >
                        <?php if($this->session->flashdata('saved')): ?>
                        <div class="alert alert-success fade in pull-left">
                            <strong>Success!</strong>
                            <?=$this->session->flashdata('saved')?>
                            <span class="close m-l-10" data-dismiss="alert">×</span>
                        </div>
                        <?php endif; ?>
                        
                        <a href="add_category?route=catalog" class="btn btn-primary m-r-15 pull-right" title="add"><i class="fa fa-plus"></i> Add Category</a>
                    </div>

                <div class="panel-body">
     
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="images" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10">#</th>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-products">
                                    <?php 
                                        if($results): $i = 0;
                                        
                                            foreach($results as $row): $i++;
                                            ?>
                                            <tr data-position="<?=$row->sorting?>" class="odd gradeX" id="<?=$row->cat_id?>">
                                                <input type="hidden" name="tablename" id="tablename" value="categories">
                                                <input type="hidden" name="idname" id="idname" value="cat_id">
                                                <td><?=$row->sorting?></td>
                                                <td><?=all_categories($row->cat_id)?></td>
                                                <td class="text-center">
                                                <?php if($row->image): ?>
                                                    <a href="<?=base_url()?>uploads/img/<?=$row->image?>" data-lightbox="gallery-group-1">                                                    
                                                        <img src="<?=base_url()?>uploads/img/<?=$row->image?>" width="100" alt="" class="">
                                                    </a>    
                                                <?php endif; ?>    
                                                </td>
                                                <td class="text-right">
                                                    <a class="btn btn-warning" href="<?=base_url()?>administrator/edit_category/<?=$row->cat_id?>?route=catalog"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger delete" href="<?=base_url()?>administrator/delete_category/<?=$row->cat_id?>?route=catalog"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr id="no-record" class="odd gradeX">
                                                <td>No Record</td>
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