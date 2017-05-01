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
                            <h3>Allocate Booth(s)</h3>
                        </div>
                        <ol class="breadcrumb navbar-text navbar-right no-bg">
                            <li class="current-parent">
                                <a class="current-parent" href="<?php echo base_url('common/dash') ?>">
                                    <i class="fa fa-fw fa-home"></i>
                                </a>
                            </li>
                            <li class="active">
                                Arrange
                            </li>
                            <li class="active">Allocate Booth(s)</li>
                        </ol>
                    </div>
                    <!--<div class="col-md-4">
                        <a class="btn btn-primary pull-right" style="margin-top: 20px;" href="" data-toggle="modal" data-target="#myModaladd" class="modaladd">
                            Add Booth
                        </a>
                    </div>-->
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
                            <th  style="font-weight: 600; color: #2c97de">Booth Name</th>
                            <th  style="font-weight: 600; color: #2c97de">Space</th>
                            <th  style="font-weight: 600; color: #2c97de">Amount</th>
                            <th  style="font-weight: 600; color: #2c97de">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno=1;
                        foreach ($records as $records):?>
                        <tr>
                            <td class="text-white"><?php echo $sno; ?></td>
                            <td class="text-white"><?php echo $records->bname; ?></td>
                            <td class="text-white"><?php echo $records->space; ?></td>
                            <td class="text-white"><?php echo $records->amount; ?></td>
                            <td class="text-center v-a-m">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="" data-toggle="modal" data-target="#myModaledit" class="modaledit" data-bId="<?php echo $records->bid; ?>" data-bname="<?php echo $records->bname; ?>" data-space="<?php echo $records->space; ?>" data-amount="<?php echo $records->amount; ?>"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Allocate">&nbsp;</span></a>
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


<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Allocate Staff</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-horizontal">
                            <?php echo form_open('Manager/alloc_booth_staff' , array('id' => 'up_booth'));?>
                            <div class="form-group">
                                <input type="hidden" id="bId" name="bId">
                                <label for="project_name" class="col-sm-3 control-label">Booth Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strname" name="strname">
                                    <?php echo form_error('strbname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project_name" class="col-sm-3 control-label">Space</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="strspace" name="strspace">
                                    <?php echo form_error('strspace'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_datepicker" class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="stramount" name="stramount">
                                    <?php echo form_error('stramount'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="from_datepicker" class="col-sm-3 control-label">Staff</label>
                                <div class="col-sm-9">
                                    <select name="strstaff" class="form-control" id="strstaff">
                                        <option value=""> --- Select --- </option>
                                        <?php
                                        foreach ($staffs as $rec):?>
                                        <option value="<?php echo $rec->user_id; ?>"><?php echo $rec->name; ?> </option>
                                    <?php  endforeach;?>
                                </select>
                                <?php echo form_error('strstaff'); ?>
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
    $("#idAstaff").addClass("active open");
</script>
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("fullname", function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetes allowed");
        $("#up_booth").validate({
            rules: {
                strname: {
                    required: true
                },
                strspace:{
                    required: true
                },
                stramount:{
                    required: true
                },
                strstaff:{
                    required: true
                }
            },
            messages: {
                strname: {
                    required: "Boooth Name required"
                },
                strspace: {
                    required: "Space is Required  required"
                },
                stramount: {
                    required: "Amount is required"
                },
                strstaff: {
                    required: "Staff is required"
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
                jQuery(element.parent()).addClass('has-error m-b-1');
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
            var bid = $(this).attr("data-bId");
            var bname = $(this).attr("data-bname");
            var space = $(this).attr("data-space");
            var amount = $(this).attr("data-amount");
            $('#bId').val(bid);
            $('#strname').val(bname) ;
            $('#strspace').val(space);
            $('#stramount').val(amount) ;
        });
    });
</script>
