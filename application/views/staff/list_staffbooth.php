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
                            <h3>List Booth(s)</h3>
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
                            <li class="active">List Booth(s)</li>
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
                        <!--<th  style="font-weight: 600; color: #2c97de">Actions</th>-->
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
                            <!--<td class="text-center v-a-m">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="" data-toggle="modal" data-target="#myModaledit" class="modaledit" data-bId="<?php /*echo $records->bid; */?>" data-bname="<?php /*echo $records->bname; */?>" data-space="<?php /*echo $records->space; */?>" data-amount="<?php /*echo $records->amount; */?>"><span class="glyphicon glyphicon-edit">&nbsp;</span></a>
                                    <a href="" data-toggle="modal" class="modaldelete"><span class="glyphicon glyphicon-trash">&nbsp;</span></a>
                                </div>
                            </td>-->
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
    $("#datatables-example").DataTable();
    $('div.dataTables_filter input').attr('placeholder', 'Enter the text here');
</script>
<script>
    $("#idBooth").addClass("active open");
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
