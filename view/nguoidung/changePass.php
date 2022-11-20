
 <div class="jb-login-register_area">
     <div class="container">
         <div class="row" style="justify-content: center;">
             <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                 <!-- form đổi mật khẩu-->
                 <form action="index.php?act=changePass" method="post">
                    <?php
                   
                    ?>
                     <div class="login-form">
                         <h4 class="login-title">Đổi mật khẩu</h4>
                            <?php
                                if(isset($_POST['btn_changePass'])){
                                    $error = array();
                                    $password = $_POST['newpass'];
                                    $email = $_SESSION['mail'];
                                    if($_POST['repass'] != $_POST['newpass']){
                                        $error['fail'] = 'Nhập lại mật khẩu không khớp !';
                                    }else{
                                        $error['success'] = 'Đổi mật khẩu thành công !';
                                        $user=forgetPass($password, $email);
                                        header('Location: index.php?act=login');
                                    }
                                }
                            ?>
                         <div class="row">
                             <div class="col-md-12 col-12">
                                 <input type="text" name="newpass" placeholder="Nhập mật khẩu mới">
                                 <input type="text" name="repass" placeholder="Nhập lại mật khẩu">
                                 <span style="color: red;"><?php if(isset($error['fail'])) echo $error['fail']  ?></span> <br>
                             </div>
                             
                             <div class="col-md-10">
                                 <div class="check-box">
                                    <a href="index.php?act=login">Đăng nhập </a>
                                 </div>
                                 <div class="register-txt">
                                    <a href="index.php?act=register">Đăng ký tài khoản mới</a>
                                 </div>
                             </div>
                             
                             <div class="col-12 wrap-btn-sub">
                                 <input type="submit" class="btn-submit" name="btn_changePass" value="Gửi" style="margin-top: 30px;">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
             </div>
            </div>
        </div>