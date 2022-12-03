<?php include_once "header.php" ?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include_once "nav.php" ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <div>
        <h3 class="alert alert-success">Cập nhật tài khoản người dùng</h3>
      </div>
      <div class="form-addcate">
        <form action="index.php?act=update_user" method="post">
          <?php if (is_array($user))
            extract($user);
          ?>
          <div class="form-group mt-3">
            <label for="formGroupExampleInput" class="font-lb">Mã người dùng</label>
            <input type="text" name="id_user" class="form-control" placeholder="Mã KH(auto increase)" value="<?= $id_user ?>" disabled>
          </div>
          <div class="form-group mt-3">
            <label for="formGroupExampleInput" class="font-lb">Tên đăng nhập</label>
            <input type="text" name="user_name" class="form-control" placeholder="Nhập tên dùng để đăng nhập" value="<?= $user_name ?>">
          </div>
          <div class="form-group mt-3">
            <label for="formGroupExampleInput" class="font-lb">Họ tên</label>
            <input type="text" name="full_name" class="form-control" placeholder="Nhập họ và tên người dùng" value="<?= $full_name ?>">
          </div>
          <div class="form-group mt-3">
            <label for="formGroupExampleInput" class="font-lb">Email</label>
            <input type="email" name="email_user" class="form-control" placeholder="Nhập email người dùng" value="<?= $email_user ?>">
          </div>
          <div class="form-group mt-3">
            <label for="formGroupExampleInput" class="font-lb">Mật khẩu</label>
            <input type="text" name="password" class="form-control" placeholder="Nhập mật khẩu muốn thay đổi" value="<?= $password ?>">
          </div>

          <div class="form-group">
            <label for="">Vai trò: <span style="color:red">
                <?php if ($role == 1) {
                  echo "Admin";
                } else {
                  echo "Thành viên";
                } ?></span></label>
            <select required class="form-control" name="role" id="">
              <?php $arr = array('0' => 'Thành Viên', '1' => 'Admin'); ?>
              <?php foreach ($arr as $key => $value) { ?>
                <option value="<?php echo $key; ?>" <?php echo $key ==  $role ? ' selected="selected"' : ''; ?>><?php echo $value; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="wrap-btn">
            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <input type="submit" name="btn_update" class="btn btn-success mt-3" value="Cập nhật">
            <input type="reset" class="btn btn-danger mt-3" value="Nhập lại">
          </div>
        </form>
      </div>
      <div class="pb-70"></div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
  <?php include_once "footer.php" ?>