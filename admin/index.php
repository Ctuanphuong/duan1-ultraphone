<?php
include 'view/header.php';

//include dao để dùng các functione: 
include "model/pdo.php";
include "model/loai.php";
include "model/sanpham.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // CONTROLLER LOẠI:
        case "addl":
            if(isset($_POST['btn_add']) && ($_POST['btn_add'])) { 
                $name_cate = $_POST['name_cate'];
                them_loai($name_cate);
                echo '<script>alert("Thêm loại thành công!")</script>';
            }
            include "view/loai/add.php";
            break;
        case "listl":
            $ds_loai = loadall_loai();
            include "view/loai/list.php";
            break;
        case "sualoai": 
            if(isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) { 
                $id_cate = $_GET['id_cate'];
                $one_loai = loadone_loai($id_cate);
            }
            include "view/loai/update.php";
            break;
            case "capnhatloai": 
                if(isset($_POST['btn_update']) && ($_POST['btn_update'])) { 
                    $id_cate = $_POST['id_cate'];
                    $name_cate = $_POST['name_cate'];
                    capnhat_loai($id_cate, $name_cate);
                    echo '<script>alert("Cập nhật loại thành công!")</script>';
                }
                $ds_loai = loadall_loai();
                include "view/loai/list.php";
                break;
                case "xoaloai": 
                    if(isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) { 
                    $id_cate = $_GET['id_cate'];
                    xoa_loai($id_cate);
                    }
                    $ds_loai = loadall_loai();
                    include "view/loai/list.php";
                    break;
    
            // CONTROLLER SẢN PHẨM:
            case "addpro":
                if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                    // $id_pro = $_POST['id_pro'];
                    $name_pro = $_POST['name_pro'];
                    $price = $_POST['price'];
                    $short_des = $_POST['short_des'];
                    $detail_des = $_POST['detail_des'];	
                    $idcate = $_POST['idcate'];
                    $img_pro = $_FILES['img_pro']['name'];
                    $target_dir = "./uploads/";
                    $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                    (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                    add_pro($name_pro, $price, $img_pro, $short_des,$detail_des, $idcate);
                    echo '<script>alert("Thêm sản phẩm thành công!")</script>';
                }
                $ds_loai = loadall_loai();
                include "view/sanpham/add.php";
                break;
            case "listpro":
                if (isset($_POST['btn_filter']) && ($_POST['btn_filter'])) {
                    $idcate = $_POST['idcate'];
                } else {
                    $idcate = 0;
                }
                $ds_loai = loadall_loai();
                $listpro = loadall_pro($idcate);
                include "view/sanpham/list.php";
                break;
            case "editpro":
                if (isset($_GET['id_pro']) && $_GET['id_pro'] > 0) {
                    $id_pro = $_GET['id_pro'];
                    $pro = loadone_pro($id_pro);
                }
    
                $ds_loai = loadall_loai();
                include "view/sanpham/update.php";
                break;
            case "updatepro":
                if (isset($_POST['btn_update']) && $_POST['btn_update'] > 0) {
                    $id_pro = $_POST['id_pro'];
                    $idcate = $_POST['idcate'];
                    $name_pro = $_POST['name_pro'];
                    $price = $_POST['price'];
                    $short_des = $_POST['short_des'];
                    $detail_des = $_POST['detail_des'];
                    $img_pro = $_FILES['img_pro']['name'];
                    $target_dir = "./uploads/";
                    $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                    (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                    update_pro($id_pro, $name_pro, $price, $short_des, $detail_des, $img_pro, $idcate);
                    echo '<script>alert("Cập nhật sản phẩm thành công!")</script>';
                }
               
                $ds_loai = loadall_loai();
                $listpro = loadall_pro();
                include "view/sanpham/list.php";
                break;
            case "removepro":
                if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
                    $id_pro = $_GET['id_pro'];
                    remove_pro($id_pro);
                }
                $ds_loai = loadall_loai();
                $listpro = loadall_pro();
                include "view/sanpham/list.php";
                break;
        default:
            include "view/content.php";
            break;
    }
} else {
    include "view/content.php";
}


include 'view/footer.php';
