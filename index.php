<?php


session_start();
ob_start(); 
include "view/head.php";
include "model/pdo.php";
include "model/sanpham.php";
include "model/loai.php";
include "model/nguoidung.php";
include "email/index.php";

//load sản phẩm trang client
$prohome = loadall_pro_home();
//load danh mục trang client
$listcate = loadall_cate();
//load 8 sản phẩm nổi bật
$list_topsp = loadall_pro_noibat();
//Lấy lại mật khẩu
$mail = new Mailer();


include "view/header.php";

// kiểm tra có act tương ứng với key người dùng click không, nếu có act thì thực hiện các case 
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'product':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = " ";
            }
            if (isset($_GET['idcate']) && ($_GET['idcate']) > 0) {
                $idcate = $_GET['idcate'];
            } else {
                $idcate = 0;
            }
            $listpro = loadall_pro($kyw, $idcate);
            $namecate =  load_namecate($idcate);
            include "view/sanpham/sanpham.php";
            break;
        case 'prodetail':
            if (isset($_GET['idpro']) && $_GET['idpro'] > 0) {
                $id_pro = $_GET['idpro'];
                $one_pro = loadone_pro($id_pro);
                extract($one_pro);
                $similar_pro = similar_pro($id_pro, $idcate);
                include "view/sanpham/sanphamct.php";
                $seekey = 'post_' . $id_pro;
                error_reporting(0);
                $sessionView = $_SESSION[$seekey];
                error_reporting(E_ALL);
                if (!$sessionView) {
                    $_SESSION[$seekey] = "1";
                    updateview($id_pro);
                } else {
                    break;
                }
            } else {
                include "view/sanpham/sanpham.php";
            }
            break;

            // CONTROLLER ĐĂNG KÝ TÀI KHOẢN:
        
        case "register":
            if (isset($_POST['btn_register']) && $_POST['btn_register']) {
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email_user = $_POST['email_user'];
                $password = $_POST['password'];
                register($user_name, $full_name, $email_user, $password);
                echo '<script>alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập")</script>';
                include "view/nguoidung/login.php";
            }
            include "view/nguoidung/register.php";
            break;
            // CONTROLLER ĐĂNG NHẬP TÀI KHOẢN:
        case "login":
            if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $check_user = check_user($user_name, $password);
                if (is_array($check_user)) {
                    $_SESSION['user'] = $check_user;
                    header('Location: index.php');
                    echo '<script>alert("Đăng nhập thành công!")</script>';
                } else {
                    echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
                }
            }
            include "view/nguoidung/login.php";
            break;
            // đăng xuất tài khoản: 
        case 'logout':
            session_unset();
            header('Location: index.php?act=login');
            break;
            //Form cách thức đổi mật khẩu
        case 'mk':
            include "view/nguoidung/cachthuclaymk.php";
                break;
        //Lấy lại mật khẩu thông qua User_name và Email_user
        case "usermk":
            if(isset($_POST['mk2']) && ($_POST['mk2'])){
                $name = $_POST['user_name'];
                $email = $_POST['email'];
                $checkuser = check_pass($name, $email );
                if(is_array($checkuser) ){
                    $thongbao = "<span style='color: red; font-weight: 700;'>  Mật khẩu của tài khoản '".$name."' là: '".$checkuser['password']."'</span>";
                }else {
                    $thongbao = "<span style='color: red; font-weight: 700;'> Tài khoản hoặc Email không tồn tại!</span> ";
                }
                
            }
            include "view/nguoidung/laymk2.php";
                break;
        //Lấy lại mật khẩu bằng mã gửi Email
            // Quên mật khẩu: Lấy mã xác nhận
            case 'forgotPass':
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
                            header('Location: index.php?act=verification');   
                        }
                        // header('Location: index.php?act=verification');   
                }
                include 'view/nguoidung/forgotpass.php';
                break;
                // Quên mật khẩu: Xác minh mã được gửi qua Email
                case 'verification':
                    include "view/nguoidung/verification.php";
                    break;
                // Quên mật khẩu: Đổi mật khẩu
                case 'changePass':
                    include "view/nguoidung/changePass.php";
                    break;
                

               // CONTROLLER THÔNG TIN TÀI KHOẢN: 
               // thông tin tài khoản
               case 'myaccount':
                include "view/nguoidung/myaccount.php"; 
                break;

                 // CONTROLLER GIỎ HÀNG:    
                 // giỏ hàng
                 case 'cart': 
                    include "view/giohang/cart.php";
                    break;
        // giá trị default: 
        default:
            include "view/content.php";
            break;
    }
} else {
    include "view/content.php";
}

include "view/footer.php";
ob_end_flush();
?>
