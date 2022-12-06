<?php include_once "header.php" ?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include_once "nav.php" ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Thêm Sản Phẩm</h6>
        </div>
        <div class="card-body">
          <div class="form-addcate">
            <form action="index.php?act=add_product" method="post" enctype="multipart/form-data">
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Mã sản phẩm</label>
                <input type="text" name="id_pro" class="form-control" placeholder="Mã loại (auto)" disabled>
              </div>
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Tên sản phẩm</label>
                <input type="text" name="name_pro" class="form-control" placeholder="Tên sản phẩm" required>
              </div>
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Giá</label>
                <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm" required>
              </div>
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Giảm giá(nếu có)</label>
                <input type="number" name="discount" min="1" max="100" class="form-control" placeholder="Nhập số % mà sản phẩm được giảm giá">
              </div>
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Mô tả ngắn</label>
                <input type="text" name="short_des" class="form-control" placeholder="Mô tả tóm tắt sản phẩm" required>
              </div>
              <div class="form-group mt-3">
                <label for="comment" class="font-lb">Mô tả chi tiết</label>
                <textarea class="form-control ckeditor" rows="5" required name="detail_des" id="detail_des" placeholder="Mô tả đầy đủ chi tiết sản phẩm"></textarea>
              </div>
              <div class="form-group mt-3">
                <label for="formGroupExampleInput" class="font-lb">Hình ảnh</label>
                <input type="file" name="img_pro" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                <label for="exampleFormControlSelect1" class="font-lb">Loại điện thoại</label>
                <select class="form-control" name="idcate" id="exampleFormControlSelect1" required>
                  <option value="0">Chọn loại</option>
                  <?php
                  foreach ($ds_loai as $loai) {
                    extract($loai);
                    echo '<option value=' . $id_cate . '>' . $name_cate . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="wrap-btn">
                <input type="submit" name="btn_add" class="btn btn-success mt-3" value="Thêm">
                <a href="?act=list_product" class="btn btn-danger mt-3">Quay Lại</a>
              </div>
            </form>
            <h3 class="text-success fs-6 mt-3 fw-bolder">
              <?php
              if (isset($noticepro) && $noticepro != "") {
                echo $noticepro;
              }
              ?>
            </h3>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>