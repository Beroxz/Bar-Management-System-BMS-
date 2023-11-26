
<aside class="main-sidebar sidebar-dark-gray elevation-4">

    <a href="">
      <span class="brand-link bg-gray" style="text-align: center; font-weight: 700; font-size: 20px;">Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <img src="../mem_img/<?php echo $_SESSION['mem_img'];?>" class="img-circle elevation-2" alt="User Image"> 
        </div>
        <div class="info">
          <a href="edit_profile.php" target="" class="d-block"> <?php echo $_SESSION['mem_name'];?> | Edit Profile</a>
        </div>
      </div>
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->

        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-header">Dashboard</li>

          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fa fa-indent"></i>
              <p>ยอดขายรายเดือน</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_date.php" class="nav-link <?php if($menu=="report"){echo "active";} ?> ">
              <i class="nav-icon fa fa-database"></i>
              <p>ยอดขายรายวัน</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="topchart.php" class="nav-link <?php if($menu=="top"){echo "active";} ?> ">
              <i class="nav-icon fa fa-file-code"></i>
              <p>สินค้าขายดี</p>
            </a>
          </li>

          <li class="nav-header">ตั้งค่าข้อมูลระบบ</li>
          
          <li class="nav-item">
            <a href="list_mem.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>จัดการสมาชิก </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_product.php" class="nav-link <?php if($menu=="product"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>จัดการรายการสินค้า </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="type_product.php" class="nav-link <?php if($menu=="type"){echo "active";} ?> ">
              <i class="nav-icon fa fa-copy"></i>
              <p>จัดการประเภทสินค้า  </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_tables.php" class="nav-link <?php if($menu=="list_tables"){echo "active";} ?> ">
              <i class="nav-icon fa fa-book"></i>
              <p>จัดการข้อมูลโต๊ะ </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="bill_order.php" class="nav-link <?php if($menu=="bill_order"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>รายงานการสั่งซื้อ </p>
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
    </div>
    <!-- /.sidebar -->
  </aside>