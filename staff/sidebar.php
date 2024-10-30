<!-- Main Sidebar Container -->
<!-- http://fordev22.com/ -->
<aside class="main-sidebar sidebar-dark-gray elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="" class="brand-link bg-gray">
      <img src="../assets/img/FD22.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FD22 | POS System</span>
    </a> -->

    <a href="">
      <span class="brand-link bg-gray" style="text-align: center; font-weight: 700; font-size: 20px;">Staff</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <img src="../mem_img/<?php echo $_SESSION['mem_img'];?>" class="img-circle elevation-2" alt="User Image"> 
        </div>
        <div class="info">
          <a href="edit_profile.php" target="" class="d-block" style="font-size: medium;"> <?php echo $_SESSION['mem_name'];?> | Edit Profile</a>
        </div>
      </div>



        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">เมนูสำหรับการขาย</li>

          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fa fa-home "></i>
              <p> Home </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_l.php" class="nav-link <?php if($menu=="sale"){echo "active";} ?> ">
              <i class="nav-icon fa fa-shopping-cart "></i>
              <p> หน้าการขาย </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="bill_order.php" class="nav-link <?php if($menu=="bill_order"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p> ประวัติการขาย </p>
            </a>
          </li>

        </ul>
        <hr>



<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <!-- http://fordev22.com/ -->
    </div>
    <!-- /.sidebar -->
  </aside>