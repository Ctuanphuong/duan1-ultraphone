<!-- phần active trang đang được hiển thị-->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Quên mật khẩu</li>
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
                <form action="index.php?act=forgotPass" method="post">
                    <div class="login-form">
                        <?php  
                        if(isset($_POST['btn_forgotPass'])){
                            $error = array();
                            $email= $_POST['email'];
                                if($email == ""){
                                    $error['email']='Không để trống Email!';
                                }
                                if(empty($error)){
                                    $result =getUserEmail($email);
                                    $code = substr(rand(0,999999),0,6);
                                    $title ="Quên mật khẩu";
                                    $content = "Mã xác thực của bạn là: <span style='color: red'>".$code."</span>";
                                    $mail->sendMail($title, $content, $email);
                                    $_SESSION['mail'] = $email;
                                    $_SESSION['code'] = $code;
                                }}
                                ?>
                        <h4 class="login-title">Tìm lại mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <labe>Email</labe>
                                <input type="email" style="margin-top: 10px;" name="email" placeholder="Nhập địa chỉ email đăng ký">
<<<<<<< HEAD
                                <span class="text-danger fw-bolder"><?php if(isset($error['email'])) echo $error['email']  ?></span>
                                <br>
                            </div>
                            <div class="col-12 wrap-btn-sub mt-2">
=======
                                <span style="color: red; "><?php if(isset($error['email'])) echo $error['email']  ?></span> <br>
                            </div>
                            <div class="col-12 wrap-btn-sub">
>>>>>>> 2271f8b54b613a902ae7b387378f3555823d2180
                                <input type="submit" class="btn-submit" name="btn_forgotPass" value="Gửi yêu cầu">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end show form đăng nhập và đăng ký -->