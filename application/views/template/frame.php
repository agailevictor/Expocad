<!-- START Sidebars -->
<aside class="navbar-default sidebar">
    <div class="sidebar-overlay-head">
        <img src="<?php echo base_url(); ?>assets/images/spin-logo-inverted.png" alt="Logo">
        <a href="javascript:void(0)" class="sidebar-switch action-sidebar-close">
            <i class="fa fa-times"></i>
        </a>
    </div>
    <div class="sidebar-logo">
        <img class="logo-default" src="<?php echo base_url(); ?>assets/images/spin-logo-big-inverse-%402X.png"
        alt="Logo"
        width="53">
        <img class="logo-slim" src="<?php echo base_url(); ?>assets/images/spin-logo-slim.png" alt="Logo">
    </div>

    <div class="sidebar-content">
        <div class="p-y-3 avatar-container">
            <img src="<?php echo base_url(); ?>assets/images/avatars/spin-avatar-woman.png" width="50" alt="Avatar"
            class="spin-avatar img-circle">

            <div class="text-center">
                <h6 class="m-b-0">Michelle Baez</h6>
                <small class="text-muted">Help Desk</small>
                <p class="m-t-1 m-b-2">
                    <span id="sidebar-avatar-chart">5,3,2,-1,-3,-2,2,3,5,2</span>
                </p>
            </div>
        </div>

        <!-- START Tree Sidebar Common -->
        <ul class="side-menu">
            <?php
            foreach($menu as $row) {
                ?>
                <li class="Dashboards" id="<?php echo $row->menu_id;?>">
                    <a href="#" title="Dashboards" id="projectMaster">
                        <i class="<?php echo $row->icon; ?>"></i><span class="nav-label"><?php echo $row->menu; ?></span><i class="fa arrow"></i>
                    </a>
                    <ul>
                        <?php
                        foreach($menu_sub as $row1) {
                          if(($row->m_id)==($row1->m_id)  && ($row->u_type)==($row1->u_type) ){?>
                          <li class="" id="<?php echo $row1->sub_id; ?>">
                            <a href="<?php echo base_url( $row1->url);?>">
                                <span class="nav-label"><?php echo $row1->s_menu; ?></span>
                            </a>
                        </li>
                        <?php }?>

                        <?php    }?>
                    </ul>
                </li>
                <?php
            }?>
        </ul>
        <!-- END Tree Sidebar Common  -->
    </div>
</aside>
<!-- END Sidebars -->
</nav>