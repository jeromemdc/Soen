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
     
                    <form action="<?=base_url().'administrator/add_attribute/'.$result->pid.'?route=catalog'?>" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured Image</label>
                            <img class="img-responsive" src="<?=base_url().'uploads/img/'.$result->image?>" alt="" width="200">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="<?=$result->name?>" readonly/>
                                <input type="hidden" class="form-control" name="pid" value="<?=$result->pid?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Type <code>*</code></label>
                            <div class="col-md-6">
                                <select name="type" class="form-control" data-parsley-required="true">
                                    <option value="">Please select type</option>
                                    <option value="color">Color</option>
                                    <option value="size">Size</option>
                                    <option value="design">Design</option>
                                    <option value="features">Features</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label">Dimensions (L x W x H)</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="length" value="0" placeholder="length" onkeypress="return onlyDotsAndNumbers(event)"/>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="width" value="0" placeholder="width" onkeypress="return onlyDotsAndNumbers(event)"/>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="height" value="0" placeholder="height" onkeypress="return onlyDotsAndNumbers(event)"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Length Class</label>
                            <div class="col-md-6">
                                <select name="length_class" class="form-control">
                                    <option value="cm">Centimeter</option>
                                    <option value="ml">Millimeter</option>
                                    <option value="inch">Inch</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Weight</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="weight" value="0" onkeypress="return onlyDotsAndNumbers(event)" placeholder="weight"/>
                            </div>
                            <div class="col-md-3">
                                <select name="weight_class" class="form-control">
                                    <option value="g">Gram</option>
                                    <option value="kg">Kilogram</option>
                                    <option value="lbs">Pound</option>
                                    <option value="oz">Ounce</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <?php $this->load->view('administrator/media_btn', array('image_type' => 'var_image')); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Attibutes</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="var_attribute" value="" placeholder="attribute"/>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="var_price" value="" onkeypress="return onlyDotsAndNumbers(event)" placeholder="price"/>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="var_sku" value="" placeholder="SKU"/>
                            </div>
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
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>SKU</th>
                                        <!-- <th>Dimension</th>
                                        <th>Weight</th> -->
                                        <th>Attribute</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-products">
                                    <?php 
                                        if($attributes): $i = 0;
                                        
                                            foreach($attributes as $row): $i++;
                                            ?>
                                            <tr  class="odd gradeX">
                                                <td class="text-center"><?php if($row->var_image != ''): ?><img src="<?=base_url().'uploads/img/'.$row->var_image?>" alt="" class="" width="100"><?php endif; ?></td>
                                                <td><?=$row->var_sku;?></td>
                                                <!-- <td><?=$row->length.' x '.$row->width.' x '.$row->height.' '.$row->length_class;?></td>
                                                <td><?=$row->weight.' '.$row->weight_class;?></td> -->
                                                <td><?=$row->var_attribute;?></td>
                                                <td><?=$row->type;?></td>
                                                <td class="text-right">Php <?=$row->var_price;?></td>
                                                <td class="text-right">
                                                    <a class="btn btn-danger delete" href="<?=base_url().'administrator/delete_attribute/'.$row->prod_var_id.'?route=catalog'?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr id="no-record" class="odd gradeX">
                                                <td>No Record</td>
                                                <td>No Record</td>
                                                <td>No Record</td>
                                                <!-- <td>No Record</td>
                                                <td>No Record</td> -->
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