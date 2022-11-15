<?php 
include "view/head.php";
include "model/pdo.php";
include "model/sanpham.php";
include "model/loai.php";

//load sản phẩm trang client
$prohome = loadall_pro_home();
//load danh mục trang client
$listcate = loadall_cate();
include "view/header.php";
// kiểm tra có act tương ứng với key người dùng click không, nếu có act thì thực hiện các case 
if(isset($_GET['act']) && ($_GET['act'] != "")) { 
    $act = $_GET['act'];
    switch($act) { 
        case 'product': 
            include "view/sanpham/sanpham.php";
            break;
            default: 
            include "view/content.php";
            break;
    }
}
else { 
    include "view/content.php";
}

include "view/footer.php";
?>