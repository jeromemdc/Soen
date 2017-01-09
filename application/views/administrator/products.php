<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Home</a></li>
			<li><a href="javascript:;">Tables</a></li>
			<li class="active"><?=$title?></li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><?=$title?> </h1>
		<!-- end page-header -->
		<form action="<?=base_url()?>administrator/delete_product?route=catalog" method="post">
		<!-- begin row -->
		<div class="row">
		    <!-- begin col-12 -->
		    <div class="col-md-12">
		        <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Data Table - Default</h4>
                    </div>

                    <div class="panel-body" >
                        <?php if($this->session->flashdata('saved')): ?>
                        <div class="alert alert-success fade in pull-left">
                            <strong>Success!</strong>
                            <?=$this->session->flashdata('saved')?>
                            <span class="close m-l-10" data-dismiss="alert">×</span>
                        </div>
                        <?php endif; ?>
                        
                        <a href="add_product?route=catalog" class="btn btn-primary m-r-15 pull-right" title="add"><i class="fa fa-plus"></i> Add Product</a>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10">#</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th class="text-right">Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($results): $i = 0;
                                            foreach($results as $row): $i++;
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?=$i?></td>
                                                <td><?=$row->name;?></td>
                                                <td class="text-center">
                                                    <a href="<?=base_url()?>uploads/img/<?=$row->image?>" data-lightbox="gallery-group-1">                                                    
                                                        <img src="<?=base_url()?>uploads/img/<?=$row->image?>" alt="" class="" width="140">
                                                    </a>    
                                                </td>
                                                <td><?=all_categories($row->cat_id)?></td>
                                                <td><?=$row->price;?></td>
                                                <td><?=$row->quantity;?></td>
                                                <td><?=($row->status == 1 ? "Enabled" : "Disabled");?></td>
                                                <td class="text-right">
                                                    <a class="btn btn-warning" href="<?=base_url()?>administrator/edit_product/<?=$row->pid?>?route=catalog"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-default" href="<?=base_url()?>administrator/add_image/<?=$row->pid?>?route=catalog"><i class="fa fa-upload"></i></a>
                                                    <a class="btn btn-primary" href="<?=base_url()?>administrator/add_attribute/<?=$row->pid?>?route=catalog"><i class="fa fa-gears"></i></a>
                                                    <a class="btn btn-danger delete" href="<?=base_url()?>administrator/delete_product/<?=$row->pid?>?route=catalog"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr class="odd gradeX">
                                                <td></td>
                                                <td>No Record</td>
                                                <td>No Record</td>
                                                <td>No Record</td>
                                                <td>No Record</td>
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
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
         </form>
	</div>
<!-- end #content -->