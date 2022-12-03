<?php include_once "header.php" ?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include_once "nav.php" ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <?php
      if (is_array($one_loai)) {
        extract($one_loai);
      }
      ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Cập nhật loại điện thoại</h6>
        </div>
        <div class="card-body">
          <div class="form-addcate">
            <form action="index.php?act=update_category" method="post">
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Mã loại</label>
                <input type="text" class="form-control" value="<?= $id_cate ?>" disabled>
              </div>
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Tên loại</label>
                <input type="text" name="name_cate" class="form-control" value="<?= $name_cate ?>">
              </div>
              <div class="wrap-btn">
                <input type="hidden" name="id_cate" value="<?= $id_cate ?>">
                <input type="submit" name="btn_update" class="btn btn-success mt-3" value="Cập nhật">
                <input type="reset" class="btn btn-danger mt-3" value="Nhập lại">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>