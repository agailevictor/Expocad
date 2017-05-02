<!-- start: Javascript for validation-->
<script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/daterangepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/javascript/date-range-picker-settings.js"></script>

<!-- end: Javascript for validation-->
<div class="content">
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">DataTables</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header only-->

    <!-- START Sub-Navbar with Header and Breadcrumbs-->
    <div class="sub-navbar sub-navbar__header-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-8 sub-navbar-column">
                        <div class="sub-navbar-header">
                            <h3>List Product(s)</h3>
                        </div>
                        <ol class="breadcrumb navbar-text navbar-right no-bg">
                            <li class="current-parent">
                                <a class="current-parent" href="<?php echo base_url('common/dash') ?>">
                                    <i class="fa fa-fw fa-home"></i>
                                </a>
                            </li>
                            <li class="active">
                                Products
                            </li>
                            <li class="active">List Product(s)</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary pull-right" style="margin-top: 20px;" href="" data-toggle="modal" data-target="#myModaladd" class="modaladd">
                            Add Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->
    <div class="container">
        <!-- START EDIT CONTENT -->
        <div class="row">
            <div class="col-lg-12">
                <table id="datatables-example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="font-weight: 600; color: #2c97de">No</th>
                            <th  style="font-weight: 600; color: #2c97de">Product Name</th>
                            <th  style="font-weight: 600; color: #2c97de">Image</th>
                            <th  style="font-weight: 600; color: #2c97de">Decription</th>
                            <th  style="font-weight: 600; color: #2c97de">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno=1;
                        foreach ($records as $records):?>
                        <tr>
                            <td class="text-white"><?php echo $sno; ?></td>
                            <td class="text-white"><?php echo $records->pname; ?></td>
                            <td><?php echo '<img src="data:image/jpg;base64,' . $records->Images . '" width="75" height="75">';?></td>
                            <td class="text-white"><?php echo $records->description; ?></td>
                            <td class="text-center v-a-m">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="" data-toggle="modal" data-target="#myModalpay" class="modaledit" data-pId="<?php echo $records->pid; ?>" data-eId="<?php echo $records->exid; ?>" data-pname="<?php echo $records->pname; ?>" data-description="<?php echo $records->description; ?>"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Request">&nbsp;</span></a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $sno=$sno+1;
                        endforeach; ?>
                    </tbody>
                </table>
                <!-- END Zero Configuration -->
            </div>
        </div>
        <!-- END EDIT CONTENT -->
    </div>
</div>

<div class="modal fade" id="myModaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Product Details</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-horizontal">
                        <!-- <?php echo form_open_multipart('Exhi/add_product' , array('id' => 'ad_product'));?> -->
                        <form method="POST" action=<?php echo base_url(); ?>Exhi/add_product enctype="multipart/form-data" id ='ad_product'>
                        <div class="form-group">                      
                            <label for="project_name" class="col-sm-3 control-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="strpnameA" name="strpnameA">
                                <?php echo form_error('strpnameA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project_name" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                               <input type="file" id="strimageA" name="strimageA">
                                <?php echo form_error('strimageA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strdescA" name="strdescA">
                                <?php echo form_error('strdescA'); ?>
                            </div>
                        </div>                                  
                    </div>
                    <div class="col-md-4 col-md-offset-2"></div>

                    <!-- END Basic Elements -->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
        </div>
        <!-- <?php echo form_close();?> -->
        </form>
    </div>
</div>
</div>

<script>
    $("#datatables-example").DataTable();
    $('div.dataTables_filter input').attr('placeholder', 'Enter the text here');
</script>
<script>
    $("#id_Eup").addClass("active open");
</script>
<script>
    $(document).ready(function() {
        $("#ad_product").validate({
            rules: {
                strpnameA: {
                    required: true
                },
                strimageA:{
                    required: true,
                    accept: "image/jpeg,image/jpg,image/png"
                },
                strdescA:{
                    required: true                   
                }
            },highlight: function(element) {
                $(element).parent('div').addClass('has-error m-b-1');
            },
            unhighlight: function(element) {
                $(element).parent('div').removeClass('has-error m-b-1');
            }

        });
        $(".modaledit").click(function(){
            var bid = $(this).attr("data-bId");            
            var bname = $(this).attr("data-bname");
            var space = $(this).attr("data-space");
            var amount = $(this).attr("data-amount");
            var status = $(this).attr("data-status");
            $('#bId').val(bid);            
            $('#strbnameA').text(bname);
            $('#strspaceA').text(space);
            $('#stramountA').text(amount);                        
        });
    });
</script>
