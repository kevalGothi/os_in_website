<?php
        session_start();
        require_once "../db/conn.php";
        $user = $_SESSION['usernam'];
        $pass = $_SESSION['pass'];
        $s = mysqli_query($conn, "select * from user where email = '$user' and status = '1'");
?>

<aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Personal</li>
                            <li class="<?= $page == 'index1.php' ? 'active':''; ?>">
                                <a class="" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboards</span>
                                    <!-- <span class="nav-label label label-danger">9</span> -->
                                </a>
                                
                            </li>
                            <?php
                                if(mysqli_num_rows($s) > 1){ ?>
                                    <li class="<?= $page == 'apply.php' ? 'active':''; ?>"><a href="apply.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Project Enquiry</span></a> </li>
                                    <li class="<?= $page == '' ? 'active':''; ?>"><a href="logout.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Logout</span></a> </li>
                               <?php }else{
                            ?>

                            <li class="<?= $page == 'all_list.php' ? 'active':''; ?>"><a href="all_list.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">All Project</span></a> </li>
                                                        <!--<li class="<?= $page == 'new_profile.php' ? 'active':''; ?>"><a href="new_profile.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Add Agency</span></a> </li>-->
                            <li class="<?= $page == 'update.php' ? 'active':''; ?>"><a href="update.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Update Agency</span></a> </li>
                            <li class="<?= $page == 'apply.php' ? 'active':''; ?>"><a href="apply.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Project Enquiry</span></a> </li>
                            <li class="<?= $page == 'demo.php' ? 'active':''; ?>"><a href="demo.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Project Details</span></a> </li>
                            
                            <li class="<?= $page == '' ? 'active':''; ?>"><a href="logout.php" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Logout</span></a> </li> <?php } ?>
                            
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>