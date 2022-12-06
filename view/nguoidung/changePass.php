<div class="jb-login-register_area">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- form đổi mật khẩu-->
                <form action="index.php?act=changePass" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Đổi mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <input type="password" name="newpass" placeholder="Nhập mật khẩu mới" required>
                                <input type="password" name="repass" placeholder="Nhập lại mật khẩu mới">
                                <span style="color: red;"><?php if (isset($error['fail'])) echo $error['fail'] ?></span> <br>
                            </div>

                            

                            <div class="col-12 wrap-btn-sub">
                                <input type="submit" class="btn-submit mt-3" name="btn_changePass" value="Đổi mật khẩu">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>