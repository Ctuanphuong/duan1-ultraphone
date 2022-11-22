Phuong
thầy đỡ nói nhiều
oke ông
tý tôi code
Văn Minh
hôm qua hc bị thầy ns gì k ae
@Văn Minh có nói ông ko đi học
trừ 2₫ á
Văn Minh
vãi nhãi
@Văn Minh ông thầy cho 7₫ á
Văn Minh
k đi mà bị trừ điểm mé nhảm vãi

@Phuong cái code phần giỏ hàng của ông tôi méo hiểu
Phuong
-))) tôi còn đ hiểu lắm mà
Nma ông cứ thêm câu if else cho nó ko có hàng là ko bấm đặt hàng dc ý
Mai kia đi thi mà thầy hỏi thì đoạn đấy tôi trả lời cho
quan trọng file giỏ hàng của ông ở đâu ý
Phuong
Tôi code mà 
À
Đợi tôi tí 
không giống tôi hay code nên rất khó
Phuong
Không thì cứ để tôi lên sớm sớm tí ae mình làm
Đoạn đấy code nhanh thôi nhỉ
nhanh á
Phuong
Cái if else không cho đặt hàng ý 
không biết giờ thấy có cho làm riêng 1 dự án ko nhỉ
Phuong
Ko thì đợi tôi tẹo xong vào meet ae mình làm 
@Linhh ko hahaa
@Phuong oke
@Phuong để tôi hỏi xem làm riêng 1 cái sau còn có cái điền vào CV
chứ này sau xin việc cũng không có sản phẩm mẫu tự làm
Phuong
Cái đấy phải thầy xác nhận à hay là sao 
@Phuong nếu ông muốn đi làm thì trong CV phải có vài cái mẫu sản phẩm mình tự làm nó mới xem xét cho ông chứ còn sản phẩm chung ko được
còn thầy ko liên quan gì đến
nhưng tôi muốn làm 1 cái từ đầu đến cuối
Văn Minh
ae chạy code có bị lỗi k
tôi vừa lấy code về chạy thì thấy lỗi
Phuong
@Linhh thế mai kia xong môn ông rảnh code lấy cái chỉnh chu ý 
Kiểu theo kiểu code với theo ý ông 
Ông code tốt lo gì :v
Văn Minh
aloo
ae chạy code bị lỗi k
Phuong
Ông xem database của ông có cái discount kia chưa 
Văn Minh
ông gửi lại database đi
@Phuong @Văn Minh nhưng khum có time ý
đây ông
@Linhh nhanh mà mấy hôm nữa thi xong ông code cùng lắm nửa tuần
@Phuong tôi nhiều việc lắm chứ h chỉ đang học thì còn rảnh rảnh một chút
Phuong
vào meet đi @All
.
<div class="col">
                                        <div class="form-group">
                                            <label for="">Vai trò:</label>
                                            <select class="form-control" name="vaitro" id="">
                                                <option value="0">Thành Viên</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                    </div>
Phuong
<!-- phần active trang đang được hiển thị-->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="breadcrumb-content">
             <ul>
                 <li><a href="index.php">Trang chủ</a></li>
                 <li class="active">Giỏ hàng</li>
             </ul>
         </div>
     </div>
 </div>
 <!--end phần active trang đang được hiển thị-->
<!-- Begin JB's Cart Area -->
<div class="jb-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="index.php?act=bill" method="post">
                            <div class="table-content table-responsive">
                           <?php if(!empty($_SESSION['mycart'])) { ?>
                           <?php viewcart(1); ?>
                            <div class="wrap-btn-order mt-4">
                            <input type="submit" href="index.php?act=bill" value="Xác nhận đặt hàng">
                            <?php } else {?>
                                <h3 class="text-danger">Giỏ hàng trống. Vui lòng thêm sản phẩm để đặt hàng!</h3>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- JB's Cart Area End Here -->
<div class="col">
                                        <div class="form-group">
                                            <label for="">Vai trò: <span style="color:red"><?php if ($edit_user['vai_tro'] == 1) {
                                                                                                echo "Admin";
                                                                                            } else {
                                                                                                echo "Thành viên";
                                                                                            } ?></span></label>
                                            <select required class="form-control" name="vaitro" id="">
                                                <?php $arr = array('0' => 'Thành Viên', '1' => 'Admin'); ?>
                                                <?php foreach ($arr as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php echo ($key ==  $edit_user['vai_tro']) ? ' selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>

                                            </select>

                                        </div>
                                    </div>
Phuong
<div id="layoutSidenav_content" class="container-fluid">
  <div class="container-fluid mt-3">
    <div>
      <h3 class="alert alert-success">Cập nhật tài khoản người dùng</h3>
    </div>
    <div class="form-addcate">
      <form action="index.php?act=updateuser" method="post">
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
              echo "Thành viên"; } ?></span></label>
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
    <div class="col">
