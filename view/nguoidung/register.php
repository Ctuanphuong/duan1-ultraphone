 <!-- phần active trang đang được hiển thị-->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="breadcrumb-content">
             <ul>
                 <li><a href="index.php">Trang chủ</a></li>
                 <li class="active">Đăng ký</li>
             </ul>
         </div>
     </div>
 </div>
 <!--end phần active trang đang được hiển thị-->
 <!-- show form đăng nhập và đăng ký-->
 <div class="jb-login-register_area">
     <div class="container">
         <div class="row" style="justify-content: center;">
             <!-- form đăng ký -->
             <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                 <form action="index.php?act=register" method="post">
                     <div class="login-form">
                         <h4 class="login-title">Đăng ký tài khoản</h4>
                         <div class="row">
                             <div class="col-md-6 col-12 mb--20">
                                 <label>Tên đăng nhập</label>
                                 <input type="text" name="user_name" placeholder="Tạo tên đăng nhập của bạn" required>
                             </div>
                             <div class="col-md-6 col-12 mb--20">
                                 <label>Họ tên</label>
                                 <input type="text" name="full_name" placeholder="Nhập họ tên của bạn" required>
                             </div>
                             <div class="col-md-12">
                                 <label>Email</label>
                                 <input type="email" name="email_user" placeholder="Nhập địa chỉ email của bạn" required>
                             </div>
                             <div class="col-md-12">
                                 <label>Mật khẩu</label>
                                 <input type="password" name="password" placeholder="Tạo mật khẩu của bạn" required>
                             </div>
                             <!-- <div class="col-md-6">
                                        <label>Xác nhận mật khẩu</label>
                                        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                                    </div> -->
                             <div class="col-12 wrap-btn-sub">
                                 <input type="submit" class="btn-submit" name="btn_register" value="Đăng ký">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- end show form đăng nhập và đăng ký -->