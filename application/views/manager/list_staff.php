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
                            <th  style="font-weight: 600; color: #2c97de">Gender</th>
                            <th  style="font-weight: 600; color: #2c97de">Age</th>
                            <th  style="font-weight: 600; color: #2c97de">House Name</th>
                            <th  style="font-weight: 600; color: #2c97de">Street Name</th>
                            <th  style="font-weight: 600; color: #2c97de">City</th>
                            <th  style="font-weight: 600; color: #2c97de">State</th>
                            <th  style="font-weight: 600; color: #2c97de">Pincode</th>
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
                            <td class="text-white"><?php echo $records->gender; ?></td>
                            <td class="text-white"><?php echo $records->age; ?></td>
                            <td class="text-white"><?php echo $records->housename; ?></td>
                            <td class="text-white"><?php echo $records->streetname; ?></td>
                            <td class="text-white"><?php echo $records->city; ?></td>                         
                            <td class="text-white"><?php echo $records->state; ?></td>
                            <td class="text-white"><?php echo $records->pincode; ?></td>                                 
                            <td class="text-white"><?php echo $records->email; ?></td>
                            <td class="text-white"><?php echo $records->mobile; ?></td>
                            <td class="text-center v-a-m">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="" data-toggle="modal" data-target="#myModaledit" class="modaledit" data-userId="<?php echo $records->user_id; ?>" data-Name="<?php echo $records->name; ?>" data-Username="<?php echo $records->user_name  ; ?>" data-gender="<?php echo $records->gender ; ?>" data-age="<?php echo $records->age ; ?>" data-hname="<?php echo $records->housename ; ?>" data-sname="<?php echo $records->streetname ; ?>" data-city="<?php echo $records->city ; ?>" data-state="<?php echo $records->state ; ?>" data-pincode="<?php echo $records->pincode ; ?>"  data-email="<?php echo $records->email ; ?>" data-mobile="<?php echo $records->mobile ; ?>"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Edit">&nbsp;</span></a>
                                    <a href="" data-toggle="modal" class="modaldelete"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Delete">&nbsp;</span></a>
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
                                <label for="from_datepicker" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                    <select name="strgenderA" class="form-control" id="strgenderA">
                                        <option value=""> --- Select --- </option>
                                        <?php
                                        foreach ($gender as $gender):?>
                                        <option value="<?php echo $gender->gender_id; ?>"><?php echo $gender->type; ?> </option>
                                    <?php  endforeach;?>
                                </select>
                                <?php echo form_error('strgenderA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">Age</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strageA" name="strageA">
                                <?php echo form_error('strageA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">House Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strhnameA" name="strhnameA">
                                <?php echo form_error('strhnameA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">Street Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strsnameA" name="strsnameA">
                                <?php echo form_error('strsnameA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strcityA" name="strcityA">
                                <?php echo form_error('strcityA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">State</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strstateA" name="strstateA">
                                <?php echo form_error('strstateA'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">Pincode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id="strpincA" name="strpincA">
                                <?php echo form_error('strpincA'); ?>
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
                                <label for="from_datepicker" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strgender" name="strgender">
                                    <?php echo form_error('strgender'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">Age</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strage" name="strage">
                                    <?php echo form_error('strage'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">House Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strhname" name="strhname">
                                    <?php echo form_error('strhname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">Street Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strsname" name="strsname">
                                    <?php echo form_error('strsname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strcity" name="strcity">
                                    <?php echo form_error('strcity'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strstate" name="strstate">
                                    <?php echo form_error('strstate'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="strpinc" name="strpinc">
                                    <?php echo form_error('strpinc'); ?>
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
        jQuery.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetes allowed");
        $("#add_staff").validate({
            rules: {
                strnameA: {
                    minlength: 2,
                    alpha : true,
                    required: true
                },
                strusernameA:{
                    minlength : 2,
                    required: true
                },
                strgenderA:{
                    required: true
                },
                strageA:{
                    digits: true,
                    required: true
                },
                strhnameA:{
                    maxlength: 20,
                    alpha: true,
                    required: true,
                },
                strsnameA:{
                    required: true,
                    alpha: true,
                    maxlength:20
                },
                strcityA:{
                 maxlength:20,
                 alpha: true,
                 required: true 
             },
             strstateA:{
                maxlength:20,
                alpha: true,
                required: true
            },
            strpincA:{
                digits: true,
                maxlength: 6,
                required: true
            },
            stremailA:{
                email: true,
                required: true
            },
            strmobileA:{
                required: true,
                digits: true,
                maxlength: 10
            }

        },highlight: function(element) {
            $(element).parent('div').addClass('has-error m-b-1');
        },
        unhighlight: function(element) {
            $(element).parent('div').removeClass('has-error m-b-1');
        }
    });

        $("#update_staff").validate({
            rules: {
                strname: {
                    minlength: 2,
                    alpha : true,
                    required: true
                },
                strusername:{
                    minlength : 2,
                    required: true
                },
                strgender:{
                    required: true
                },
                strage:{
                    digits: true,
                    required: true
                },
                strhname:{
                    maxlength: 20,
                    alpha: true,
                    required: true,
                },
                strsname:{
                    required: true,
                    alpha: true,
                    maxlength:20
                },
                strcity:{
                   maxlength:20,
                   alpha: true,
                   required: true 
               },
               strstate:{
                maxlength:20,
                alpha: true,
                required: true
            },
            strpinc:{
                digits: true,
                maxlength: 6,
                required: true
            },
            stremail:{
                email: true,
                required: true
            },
            strmobile:{
                required: true,
                digits: true,
                maxlength: 10
            }

        },highlight: function(element) {
            $(element).parent('div').addClass('has-error m-b-1');
        },
        unhighlight: function(element) {
            $(element).parent('div').removeClass('has-error m-b-1');
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
            var Gender = $(this).attr("data-gender");
            var Age = $(this).attr("data-age");
            var Hname = $(this).attr("data-hname");
            var Sname = $(this).attr("data-sname");
            var City = $(this).attr("data-city");
            var State = $(this).attr("data-state");
            var Pincode = $(this).attr("data-pincode");
            var Email = $(this).attr("data-email");
            var Mobile = $(this).attr("data-mobile");
            $('#userId').val(Id);
            $('#strname').val(Name) ;
            $('#strusername').val(Username );
            $('#strgender').val(Gender);
            $('#strage').val(Age);
            $('#strhname').val(Hname );
            $('#strsname').val(Sname );
            $('#strcity').val(City );
            $('#strstate').val(State );
            $('#strpinc').val(Pincode );
            $('#stremail').val(Email) ;
            $('#strmobile').val(Mobile);
        });
    });
</script>
