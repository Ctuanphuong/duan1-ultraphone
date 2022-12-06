<?php
session_start();
require_once "controller/controller.php";

//include dao để dùng các functione: 

include "model/pdo.php";
include "model/loai.php";
include "model/sanpham.php";
include "model/nguoidung.php";
include "model/hoadon.php";
include "model/binhluan.php";
include "model/thongke.php";
include "model/hoidap.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case '/':

        case 'dashboard':
            if (isset($_SESSION['admin'])) {
                render('dashboard');
            } else {
                header("location: index.php?act=login");
            }
            // render('dashboard');
            break;
        case 'logout':
            session_unset();
            header('Location: index.php?act=login');
            break;
        case 'login':
            if (isset($_SESSION['admin'])) {
                header('location: index.php');
            } else {
                if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    if ($user_name == null || $password == null) {
                        echo '<script>alert("Điền đầy đủ thông tin !")</script>';
                    } else {
                        $check = check_user_admin($user_name, $password);
                        if (is_array($check)) {
                            $_SESSION['admin'] = $check;
                            echo '<script>alert("Đăng nhập thành công!")</script>';
                            // sleep(10);
                            header('Location: index.php');
                        } else {
                            echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
                        }
                    }
                }
                render('login');
            }
            break;

            // CONTROLLER LOẠI:
        case "add_category":
            if (isset($_SESSION['admin'])) {
                if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                    $name_cate = $_POST['name_cate'];
                    if ($name_cate == null) {
                        echo '<script>alert("Vui lòng nhập đầy đủ !")</script>';
                    } else {
                        them_loai($name_cate);
                        echo '<script>alert("Thêm loại thành công!")</script>';
                    }
                }
                render('add_category');
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "list_category":

            if (isset($_SESSION['admin'])) {
                $ds_loai = loadall_loai();
                render(
                    'list_category',
                    ['ds_loai' => $ds_loai]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "edit_category":

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                    $id_cate = $_GET['id_cate'];
                    $one_loai = loadone_loai($id_cate);
                }
                render(
                    'update_category',
                    ['one_loai' => $one_loai]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "update_category":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_cate = $_POST['id_cate'];
                $name_cate = $_POST['name_cate'];
                capnhat_loai($id_cate, $name_cate);
                echo '<script>alert("Cập nhật loại thành công!")</script>';
            }
            header('location:index.php?act=list_category');
            break;
        case "delete_cate":
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                $id_cate = $_GET['id_cate'];
                xoa_loai($id_cate);
            }
            header('location:index.php?act=list_category');
            break;

            // CONTROLLER SẢN PHẨM:
        case "add_product":

            if (isset($_SESSION['admin'])) {
                if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                    // $id_pro = $_POST['id_pro'];
                    $name_pro = $_POST['name_pro'];
                    $price = $_POST['price'];
                    $discount = $_POST['discount'];
                    $short_des = $_POST['short_des'];
                    $detail_des = $_POST['detail_des'];
                    $idcate = $_POST['idcate'];
                    $img_pro = $_FILES['img_pro']['name'];
                    $target_dir = "./uploads/";
                    $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                    $extension = pathinfo($img_pro, PATHINFO_EXTENSION);

                    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

                    (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                    if ($name_pro == null || $price == null || $short_des == null || $idcate == null) {
                        echo '<script>alert("Vui lòng nhập đầy đủ nội dung !")</script>';
                    } elseif ($price <= 0) {
                        echo '<script>alert("Giá nhập không đúng !")</script>';
                    } elseif (!in_array($extension, $allowed_extensions)) {
                        echo '<script>alert("File ảnh không phù hợp !")</script>';
                    } else {
                        add_pro($name_pro, $price, $discount, $img_pro, $short_des, $detail_des, $idcate);
                        echo '<script>alert("Thêm sản phẩm thành công !")</script>';
                    }
                }
                $ds_loai = loadall_loai();
                render(
                    'add_product',
                    ['ds_loai' => $ds_loai]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "list_product":

            if (isset($_SESSION['admin'])) {
                if (isset($_POST['btn_filter']) && ($_POST['btn_filter'])) {
                    $idcate = $_POST['idcate'];
                } else {
                    $idcate = 0;
                }
                $ds_loai = loadall_loai();
                $listpro = loadall_pro($idcate);
                render(
                    "list_product",
                    ['ds_loai' => $ds_loai, 'listpro' => $listpro]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "edit_product":

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_pro']) && $_GET['id_pro'] > 0) {
                    $id_pro = $_GET['id_pro'];
                    $pro = loadone_pro($id_pro);
                }

                $ds_loai = loadall_loai();
                render(
                    'update_product',
                    ['ds_loai' => $ds_loai, 'pro' => $pro]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case "update_product":
            if (isset($_POST['btn_update']) && $_POST['btn_update'] > 0) {
                $id_pro = $_POST['id_pro'];
                $idcate = $_POST['idcate'];
                $name_pro = $_POST['name_pro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $short_des = $_POST['short_des'];
                $detail_des = $_POST['detail_des'];
                $img_pro = $_FILES['img_pro']['name'];
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                update_pro($id_pro, $name_pro, $price, $discount, $short_des, $detail_des, $img_pro, $idcate);
                echo '<script>alert("Cập nhật sản phẩm thành công!")</script>';
                header('location:index.php?act=list_product');
            }
            break;
        case "delete_product":
            if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
                $id_pro = $_GET['id_pro'];
                remove_pro($id_pro);
            }
            header('location:index.php?act=list_product');
            break;

            // CONTROLLER NGƯỜI DÙNG: 
            // danh sách người dùng
        case 'list_user':

            if (isset($_SESSION['admin'])) {
                $listuser = loadall_user();
                render(
                    'list_user',
                    ['listuser' => $listuser]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
            // chỉnh sửa user
        case 'edit_user':

            if (isset($_SESSION['admin'])) {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    $id_user = $_GET['id_user'];
                    $user = loadone_user($id_user);
                }
                render(
                    'update_user',
                    ['user' => $user]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case 'update_user':
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_user = $_POST['id_user'];
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email_user = $_POST['email_user'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                update_user($id_user, $user_name, $full_name, $email_user, $password, $role);
                echo '<script>alert("Cập nhật tài khoản thành công!")</script>';
            }
            header('location: index.php?act=list_user');
            break;
            // Xóa người dùng
        case "delete_usser":
            if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                $id_user = $_GET['id_user'];
                delete_user($id_user);
            }
            header('location:index.php?act=list_user');
            break;

            //CONTROLLER HÓA ĐƠN

            // show all bill
        case 'list_bill':

            if (isset($_SESSION['admin'])) {
                $listbill = loadall_bill(0);
                render(
                    'list_bill',
                    ['listbill' => $listbill]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
            //     xóa bill: 
            // case 'removebill':
            //     if (isset($_GET['idbill']) && ($_GET['idbill'])) {
            //         $idbill = $_GET['idbill'];
            //         remove_bill($idbill);
            //     }
            //     $listbill = loadall_bill(0);
            //     include "view/hoadon/list.php";
            //     break;
        case 'edit_bill':
            if (isset($_SESSION['admin'])) {
                if (isset($_GET['idbill']) && ($_GET['idbill']) > 0) {
                    $idbill = $_GET['idbill'];
                    $one_bill = loadone_bill($idbill);
                }
                render(
                    'update_bill',
                    ['one_bill' => $one_bill]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
        case 'update_bill':
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_bill = $_POST['id_bill'];
                $status = $_POST['status'];
                $status_pay = $_POST['status_pay'];
                if ($status == 3) {
                    $status_pay = 1;
                }
                update_bill($id_bill, $status, $status_pay);
                echo '<script>alert("Cập nhật đơn hàng thành công!")</script>';
                header('location:index.php?act=list_bill');
            }
            break;
        case 'billdetail':
            if (isset($_SESSION['admin'])) {
                if (isset($_GET['idbill']) && ($_GET['idbill']) > 0) {
                    $idbill = $_GET['idbill'];
                    $one_bill = loadone_bill($idbill);
                }
                render(
                    'billdetail',
                    ['one_bill' => $one_bill]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
            //CONTROLLER BÌNH LUẬN
            //show list: 
        case 'list_cmt':
            if (isset($_SESSION['admin'])) {
                $listcmt = loadall_cmt();
                render(
                    'list_comment',
                    ['listcmt' => $listcmt]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
            //xóa bì-nh luận: 
        case 'delete_cmt':
            if (isset($_GET['idcmt']) && ($_GET['idcmt']) > 0) {
                $id_cmt = $_GET['idcmt'];
                remove_cmt($id_cmt);
            }
            header('location: index.php?act=list_cmt');
            break;

            //CONTROLLER THỐNG KÊ
            //list thống kê: 
        case 'list_statis':
            if (isset($_SESSION['admin'])) {
                $liststatis = loadall_statis();
                render(
                    'list_statistic',
                    ['liststatis' => $liststatis]
                );
            } else {
                header("location: index.php?act=login");
            }

            break;
            // Danh sách hỏi đáp
        case 'list_ques':
            if (isset($_SESSION['admin'])) {
                $listques = question();
                render(
                    'list_question',
                    ['listques' => $listques]
                );
            } else {
                header("location: index.php?act=login");
            }
        break;
           //xóa hỏi đáp: 
           case 'delete_ques':
            if (isset($_GET['id_ques']) && ($_GET['id_ques']) > 0) {
                $id_ques = $_GET['id_ques'];
                delete_ques($id_ques);
            }
            header('location: index.php?act=list_ques');
            break;

        default:
            if (isset($_SESSION['admin'])) {
                render('dashboard');
            } else {
                header("location: index.php?act=login");
            }
            // render('dashboard');
    }
} else {
    if (isset($_SESSION['admin'])) {
        render('dashboard');
    } else {
        header("location: index.php?act=login");
    }
    // render('dashboard');
}
