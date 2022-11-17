<?php 
include "view/head.php";
include "model/pdo.php";
include "model/sanpham.php";
include "model/loai.php";

//load sản phẩm trang client
$prohome = loadall_pro_home();
//load danh mục trang client
$listcate = loadall_cate();
//load 8 sản phẩm nổi bật
$list_topsp = loadall_pro_noibat();
include "view/header.php";

// kiểm tra có act tương ứng với key người dùng click không, nếu có act thì thực hiện các case 
if(isset($_GET['act']) && ($_GET['act'] != "")) { 
    $act = $_GET['act'];
    switch($act) { 
        case 'product': 
            if(isset($_POST['kyw']) && ($_POST['kyw']) != "")  { 
                $kyw = $_POST['kyw'];
            }
            else { 
                $kyw = " ";
            }
            if(isset($_GET['idcate']) && ($_GET['idcate']) > 0) { 
                $idcate = $_GET['idcate'];
            }
            else { 
                $idcate = 0;
            }
            $listpro = loadall_pro($kyw, $idcate);
            $cate_name = load_name_cate($idcate);
            include "view/sanpham/sanpham.php";
            break;
        case 'prodetail':
            include "view/sanpham/sanphamct.php";
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