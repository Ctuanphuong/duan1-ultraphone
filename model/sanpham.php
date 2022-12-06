<?php 
// show toàn bộ sản phẩm trang home
function loadall_pro_home()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY id_pro desc limit 0,8";
    $listpro= pdo_query($sql);
    return $listpro;
}
function loadone_pro($id_pro)
{
    $sql = "SELECT * FROM product WHERE id_pro=" . $id_pro;
    $onepro = pdo_query_one($sql);
    return $onepro;
}


// show toàn bộ sản phẩm theo keyword được tìm kiếm và theo danh mục sản phẩm
function loadall_pro($kyw = "", $idcate = 0)
{
    $sql = "SELECT * FROM product WHERE 1";
    if($kyw != '') { 
        $sql .= " AND name_pro LIKE '%".$kyw."%'";
    } 
    if($idcate > 0 ) { 
        $sql .= " AND idcate = '".$idcate."'";
    }
    $sql .= " ORDER BY id_pro desc";
    $listpro= pdo_query($sql);
    return $listpro;
}
// show sản phẩm bán chạy
function loadall_pro_best()
{
    $sql = "SELECT a.*, COUNT(*) FROM product a INNER JOIN cart b on a.id_pro = b.id_pro INNER JOIN bill c ON b.id_bill = c.id_bill WHERE c.status_pay = 1 GROUP BY a.name_pro ORDER BY `COUNT(*)` DESC";
    $listpro= pdo_query($sql);
    return $listpro;
}
// show 8 sản phẩm nổi bật được xem nhiều nhất
function loadall_pro_noibat()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY view desc limit 0,8";
    $listpro= pdo_query($sql);
    return $listpro;
}
function similar_pro($id_pro, $idcate) { 
$sql = "SELECT * FROM product WHERE idcate = ".$idcate." AND id_pro <> ".$id_pro;
$listpro = pdo_query($sql);
return $listpro;
}


function updateview($a)
{
    $sql = "UPDATE product SET view = view+1 WHERE id_pro = ".$a;
    $listpro= pdo_query($sql);
    return $listpro;
}