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
// show 8 sản phẩm nổi bật được xem nhiều nhất
function loadall_pro_noibat()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY view desc limit 0,8";
    $listpro= pdo_query($sql);
    return $listpro;
}
?>