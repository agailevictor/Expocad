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
                            <h3>List Staff</h3>
                        </div>
                        <ol class="breadcrumb navbar-text navbar-right no-bg">
                            <li class="current-parent">
                                <a class="current-parent" href="<?php echo base_url('common/dash') ?>">
                                    <i class="fa fa-fw fa-home"></i>
                                </a>
                            </li>
                            <li class="active">
                                Master
                            </li>
                            <li class="active">List Staff</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary pull-right" style="margin-top: 20px;" href="" data-toggle="modal" data-target="#myModaladd" class="modaladd">
                            Add Staff
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
                        <th  style="font-weight: 600; color: #2c97de">Name</th>
                        <th  style="font-weight: 600; color: #2c97de">Username</th>
                        <th  style="font-weight: 600; color: #2c97de">Email</th>
                        <th  style="font-weight: 600; color: #2c97de">Mobile</th>
                        <th  style="font-weight: 600; color: #2c97de">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sno=1;
                    foreach ($records as $records):?>
                        <tr>
                            <td class="text-white"><?php echo $sno; ?></td>
                            <td class="text-white"><?php echo $records->name; ?></td>
                            <td class="text-white"><?php echo $records->user_name; ?></td>
                            <td class="text-white"><?php echo $records->email; ?></td>
                            <td class="text-white"><?php echo $records->mobile; ?></td>
                            <td class="text-center v-a-m">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="" data-toggle="modal" data-target="#myModaledit" class="modaledit" data-userId="<?php echo $records->user_id; ?>" data-Name="<?php echo $records->name; ?>" data-Username="<?php echo $records->user_name  ; ?>" data-email="<?php echo $records->email ; ?>" data-mobile="<?php echo $records->mobile ; ?>"><span class="glyphicon glyphicon-edit">&nbsp;</span></a>
                                    <a href="" data-toggle="modal" class="modaldelete"><span class="glyphicon glyphicon-trash">&nbsp;</span></a>
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
                <h4 class="modal-title" id="myModalLabel">Add New Staff</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-horizontal">
                            <?php echo form_open('manager/add_staff' , array('id' => 'add_staff'));?>
                            <div class="form-group">
                                <label for="project_name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strnameA" name="strnameA">
                                    <?php echo form_error('strnameA'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project_name" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strusernameA" name="strusernameA">
                                    <?php echo form_error('strusrnameA'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="stremailA" name="stremailA">
                                    <?php echo form_error('stremailA'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="to_datepicker" class="col-sm-3 control-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strmobileA" name="strmobileA">
                                    <?php echo form_error('strmobileA'); ?>
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
                <input type="submit" class="btn btn-primary btn-sm" value="Add" />
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Staff Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-horizontal">
                            <?php echo form_open('manager/update_staff' , array('id' => 'update_staff'));?>
                            <div class="form-group">
                                <input type="hidden" id="userId" name="userId">
                                <label for="project_name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strname" name="strname">
                                    <?php echo form_error('strname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project_name" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strusername" name="strusername">
                                    <?php echo form_error('strusrname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="stremail" name="stremail">
                                    <?php echo form_error('stremail'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="to_datepicker" class="col-sm-3 control-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strmobile" name="strmobile">
                                    <?php echo form_error('strmobile'); ?>
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
                <input type="submit" class="btn btn-primary btn-sm" value="Save Changes" />
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

<script>
    $("#datatables-example").DataTable();
    $('div.dataTables_filter input').attr('placeholder', 'Enter the text here');
</script>
<script>
    $("#idStaff").addClass("active open");
</script>
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("fullname", function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetes allowed");
        $("#validations").validate({
            rules: {
                strProjectName: {
                    minlength: 2,
                    required: true
                },
                dateFrom:{
                    required: true
                },
                dateTo:{
                    required: true
                }
            },
            messages: {
                strProjectName: {
                    required: "Project Name required"
                },
                dateFrom: {
                    required: "Project Start Date is Required  required"
                },
                dateTo: {
                    required: "Project End Date is required"
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
                jQuery(element.parent()).addClass('has-error m-b-1'); // to show error on element also
            }

        });
        $(".modaldelete").click(function(){
            if(confirm("Do you want to delete?"))
            {
                var id = $(this).attr("data-journalId");
                $.post( "<?php echo base_url(); ?>journal/delete_journal",{id:id}, function( data ) {
                    location.reload();
                });
            }
        });
        $(".modaledit").click(function(){
            var Id = $(this).attr("data-userId");
            var Name = $(this).attr("data-Name");
            var Username = $(this).attr("data-username");
            var Email = $(this).attr("data-email");
            var Mobile = $(this).attr("data-mobile");
            $('#userId').val(Id);
            $('#strname').val(Name) ;
            $('#strusername').val(Username );
            $('#stremail').val(Email) ;
            $('#strmobile').val(Mobile);
        });
    });
</script>
