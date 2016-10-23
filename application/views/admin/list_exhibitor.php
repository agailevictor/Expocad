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
                            <h3>List Exhibitor</h3>
                        </div>
                        <ol class="breadcrumb navbar-text navbar-right no-bg">
                            <li class="current-parent">
                                <a class="current-parent" href="<?php echo base_url('common/dash') ?>">
                                    <i class="fa fa-fw fa-home"></i>
                                </a>
                            </li>
                            <li class="active">
                                Approve
                            </li>
                            <li class="active">List Exhibitor</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
<!--                         <a class="btn btn-primary pull-right" style="margin-top: 20px;" href="" data-toggle="modal" data-target="#myModaladd" class="modaladd">
                            Add Manager
                        </a> -->
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
                                <a href="" data-toggle="modal" data-target="#myModaledit" class="modaledit" data-userId="<?php echo $records->user_id; ?>" data-Name="<?php echo $records->name; ?>" data-Username="<?php echo $records->user_name  ; ?>" data-gender="<?php echo $records->gender ; ?>" data-age="<?php echo $records->age ; ?>" data-hname="<?php echo $records->housename ; ?>" data-sname="<?php echo $records->streetname ; ?>" data-city="<?php echo $records->city ; ?>" data-state="<?php echo $records->state ; ?>" data-pincode="<?php echo $records->pincode ; ?>" data-email="<?php echo $records->email ; ?>" data-mobile="<?php echo $records->mobile ; ?>"><span class="glyphicon glyphicon-check" data-toggle="tooltip" data-placement="top" title="Approve">&nbsp;</span></a>
                                <a href="" data-toggle="modal" class="modaldelete"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Reject">&nbsp;</span></a>
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

<script>
$("#datatables-example").DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
});
    $('div.dataTables_filter input').attr('placeholder', 'Enter the text here');
</script>
<script>
    $("#idApproveExhi").addClass("active open");
</script>
<script>
    $(document).ready(function() {
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
