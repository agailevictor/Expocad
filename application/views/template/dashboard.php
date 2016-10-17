<!--START Content -->
<div class="content">
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">Projects</h3>
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
                <div class="col-lg-12 sub-navbar-column">
                    <div class="sub-navbar-header">
                        <h3>Dashboard</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="<?php echo base_url('common/dash') ?>">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->


    <div class="container">
        <!-- START EDIT CONTENT -->
        <div class="row">
            <?php if ($this->session->userdata('user_type')=='1') { ?>
            <div class="col-lg-12 m-t-2">
                <!-- START ROW -->
                <div class="row">

                    <!-- START Graph -->
                    <div class="col-lg-5">
                        <!-- START ROW "Graph" Header -->
                        <div class="row m-b-2">
                            <div class="col-md-5">
                                <h4 class="m-b-0 f-w-300">Manager Vs Booth</h4></div>
                                <div class="col-md-4 col-md-offset-4 text-right">
                                </div>
                            </div>
                            <!-- END ROW "Graph" Header -->
                            <div class="panel panel-default b-a-2 b-gray-dark no-bg">
                                <div class="panel-body">
                                    <div id="container1"></div>
                                </div>
                            </div>
                        </div>
                        <!-- END Graph -->

                        <!-- START Calendar -->
                        <div class="col-lg-7">
                            <!-- START ROW "Calendar" Header -->
                            <div class="row m-b-2">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <h4 class="m-b-0 f-w-300">Calendar</h4></div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 col-xs-offset-2 col-sm-offset-4 col-md-offset-4 text-right">
                                    </div>
                                </div>
                                <!-- END ROW "Calendar" Header -->
                                <div class="panel panel-default b-a-2 b-gray-dark no-bg">
                                    <div class="panel-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Calendar -->
                        </div>
                        <!-- END ROW -->

                    </div>
                    <?php } else if ($this->session->userdata('user_type')=='2'){?>
                    <div class="col-lg-12 m-t-2">
                        <!-- START ROW -->
                        <div class="row">

                            <!-- START Graph -->
                            <div class="col-lg-5">
                                <!-- START ROW "Graph" Header -->
                                <div class="row m-b-2">
                                    <div class="col-md-5">
                                        <h4 class="m-b-0 f-w-300">Staff Vs Booth</h4></div>
                                        <div class="col-md-4 col-md-offset-4 text-right">
                                        </div>
                                    </div>
                                    <!-- END ROW "Graph" Header -->
                                    <div class="panel panel-default b-a-2 b-gray-dark no-bg">
                                        <div class="panel-body">
                                            <div id="container2"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Graph -->

                                <!-- START Calendar -->
                                <div class="col-lg-7">
                                    <!-- START ROW "Calendar" Header -->
                                    <div class="row m-b-2">
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <h4 class="m-b-0 f-w-300">Calendar</h4></div>
                                            <div class="col-md-4 col-sm-4 col-xs-4 col-xs-offset-2 col-sm-offset-4 col-md-offset-4 text-right">
                                            </div>
                                        </div>
                                        <!-- END ROW "Calendar" Header -->
                                        <div class="panel panel-default b-a-2 b-gray-dark no-bg">
                                            <div class="panel-body">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Calendar -->
                                </div>
                                <!-- END ROW -->

                            </div>
                            <?php } ?>
                        </div>

                        <!-- END EDIT CONTENT -->
                    </div>

                </div>
                <!-- END Content-->
                <script type="text/javascript">

                    $(document).ready(function() {
                        var chk = <?php echo $_SESSION['user_type']; ?>;
                        cal();
                        highchart();
                        // if(chk = 1)
                        // {
                        //     graph_admin();
                        // }
                        // if(chk = 2)
                        // {
                        //     graph_manager();
                        // }
                        // if (chk = 3)
                        // {
                        // }
                    });
                </script>
                <script type="text/javascript">
                    function graph_admin()
                    {
                        $('#container1').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Manager Vs Booth'
                            },
                            xAxis: {
                                categories: [''],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'No'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Booth 1',
                                data: [49.9]

                            }, {
                                name: 'Booth 2',
                                data: [83.6]

                            }, {
                                name: 'Booth 3',
                                data: [48.9]

                            }, {
                                name: 'Booth 4',
                                data: [42.4]

                            }]
                        });
                    }
                </script>
                <script type="text/javascript">
                    function graph_manager()
                    {
                        $('#container2').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Staff Vs Booth'
                            },
                            xAxis: {
                                categories: [''],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'No'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Booth 1',
                                data: [49.9]

                            }, {
                                name: 'Booth 2',
                                data: [83.6]

                            }, {
                                name: 'Booth 3',
                                data: [48.9]

                            }, {
                                name: 'Booth 4',
                                data: [42.4]

                            }]
                        });
                    }
                </script>
                <script type="text/javascript">
                    function cal()
                    {
                        $('#calendar').fullCalendar({
                    // put your options and callbacks here
                });
                    }
                </script>
                <script type="text/javascript">
                    function highchart()
                    {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url('common/highchart'); ?>",
                            data: {},
                            async: false,
                            cache: false,
                            dataType: "json",
                            success: function (data) {
                                // if (data.status == "success") {
                                //     if (data.count > 0) {
                                        //console.log(data.status);
                                        $('#container1').highcharts({
                                            chart: {
                                                type: 'column'
                                            },
                                            title: {
                                                text: 'Manager Vs Booth'
                                            },
                                            xAxis: {
                                                categories: [''],
                                                crosshair: true
                                            },
                                            yAxis: {
                                                min: 0,
                                                title: {
                                                    text: 'No'
                                                }
                                            },
                                            tooltip: {
                                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                                                footerFormat: '</table>',
                                                shared: true,
                                                useHTML: true
                                            },
                                            plotOptions: {
                                                column: {
                                                    pointPadding: 0.2,
                                                    borderWidth: 0
                                                }
                                            },
                                            series: data
                                        });
                                //     }
                                //     else {

                                //     }
                                // } else {
                                //     console.log(data.status);
                                // }
                            },
                            failure: function () {
                                console.log(' Ajax Failure');
                            },
                            complete: function () {
                                console.log("complete");
                            }
                        });
                    }
                </script>