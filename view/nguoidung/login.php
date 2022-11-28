 <!-- phần active trang đang được hiển thị-->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="breadcrumb-content">
             <ul>
                 <li><a href="index.php">Trang chủ</a></li>
                 <li class="active">Đăng nhập</li>
             </ul>
         </div>
     </div>
 </div>
 <!--end phần active trang đang được hiển thị-->

 <!-- show form đăng nhập và đăng ký-->
 <div class="jb-login-register_area">
     <div class="container">
         <div>
             <?php
                if (isset($noti_success) && $noti_success != "") {
                    echo $noti_success;
                }
                ?>
         </div>
         <div class="row" style="justify-content: center;">
             <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                 <!-- form đăng nhập-->
                 <form action="index.php?act=login" method="post">
                     <div class="login-form">
                         <h4 class="login-title">Đăng nhập tài khoản</h4>
                         <div class="row">
                             <div class="col-md-12 col-12">
                                 <labe>Tài khoản</labe>
                                 <input type="text" name="user_name" placeholder="Nhập tên tài khoản hoặc địa chỉ email của bạn">
                             </div>
                             <div class="col-12 mb--20">
                                 <label>Mật khẩu</label>
                                 <input type="password" name="password" placeholder="Nhập mật khẩu của bạn">
                             </div>
                             <div class="col-md-8">
                                 <div class="check-box">
                                     <input type="checkbox" id="remember_me">
                                     <label for="remember_me">Ghi nhớ tài khoản</label>
                                 </div>
                                 <div class="register-txt">
                                     <a href="index.php?act=register" style="font-weight: 500">Đăng ký tài khoản mới</a>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="forgotton-password_info">
                                     <a href="index.php?act=mk">Quên mật khẩu?</a>
                                 </div>
                             </div>
                             <div class="col-12 wrap-btn-sub">
                                 <input type="submit" class="btn-submit" name="btn_login" value="Đăng nhập" style="margin-top: 30px;">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>