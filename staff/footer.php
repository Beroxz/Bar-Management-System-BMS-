</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 BarCode-POS System
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="../assets/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="../assets/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../assets/jquery.dataTables.js"></script>
<script src="../assets/dataTables.bootstrap4.js"></script>
<script src="../assets/tagsinput.js?v=1"></script>

<script src="../assets/sweetalert2@9.js"></script>

<script src="../assets/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="../assets/demo.js"></script>
<!-- AdminLTE for demo purposes -->



<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script>
$(function() {

    $('#example1').DataTable({
        "order": [
            [0, "desc"]
        ],
        "lengthMenu": [
            [10 ,25, 50, -1],
            [10 ,25, 50, "All"]
        ],

    });

    

});
</script>

<?php if(isset($_GET['save_ok'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกคำสั่งซื้อสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['save_booking'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกการจองสำเร็จสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['book_cancel'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ยกเลิกการจองสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_editp'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'Edit Profile | <?php echo $row['mem_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
echo '<meta http-equiv="refresh" content="1;url=index.php" />';
<?php } ?>

<?php if(isset($_GET['mem_error'])){ ?>
<script>
  Swal.fire({
  title: 'error',
  text: 'ข้อมูล Username ซ้ำ',
  icon: 'error',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['mem_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_no'])){ ?>
<script>
  Swal.fire({
  title: 'Error',
  text: 'ไม่สามารถเข้าถึงได้',
  icon: 'error',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_error'])){ ?>
<script>
  Swal.fire({
  title: 'error',
  text: 'ข้อมูล Username ซ้ำ',
  icon: 'error',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['product_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['product_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขข้อมูล | <?php echo $row['p_name'];?> สำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['product_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['product_no'])){ ?>
<script>
  Swal.fire({
  title: 'Error',
  text: 'ไม่สามารถเข้าถึงได้',
  icon: 'error',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

