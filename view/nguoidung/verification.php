
 <div class="jb-login-register_area">
     <div class="container">
         <div class="row" style="justify-content: center;">
             <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                 <!-- form nhập mã xác minh-->
                 <form action="index.php?act=verification" method="post">
                    <?php
                       if(isset($_POST['btn_verification'])){
                        $error = array();
                        if($_POST['ma'] != $_SESSION['code']){
                            $error['fali'] = 'Mã xác nhận không hợp lệ !';
                        }else{
                            header('Location: index.php?act=changePass');
                        }
                       } 

                    ?>
                     <div class="login-form">
                         <h4 class="login-title">Nhập mã xác nhận</h4>
                            <div style="font-weight: 700; color: rgb(225 29 72);">
                            Hãy nhập mã xác nhận mà chúng tôi đã gửi cho bạn về Email !
                            </div>
                         <div class="row">
                             <div class="col-md-12 col-12">
                                 <input type="text" name="ma" placeholder="Nhập mã xác nhận">
                                 <span style="color: red;"><?php if(isset($error['fali'])) echo $error['fali']  ?></span>
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
                                 <input type="submit" class="btn-submit" name="btn_verification" value="Gửi yêu cầu" style="margin-top: 30px;">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
             </div>
            </div>
        </div>