<?php 
function add_pro($name_pro, $price, $discount, $img_pro, $short_des,$detail_des, $idcate) { 
    $sql = "INSERT INTO product (name_pro, price, discount, img_pro, short_des, detail_des, idcate ) VALUES ('$name_pro','$price','$discount','$img_pro','$short_des','$detail_des','$idcate')";
    pdo_execute($sql);
}
function loadall_pro($idcate = 0)
{
    $sql = "SELECT * FROM product WHERE 1";
    if ($idcate > 0) {
        $sql .=" AND idcate = '" . $idcate . "'";
    }
    $sql .=" ORDER BY id_pro DESC";
    $listpro = pdo_query($sql);
    return $listpro;
}
function loadone_pro($id_pro) { 
    $sql = "SELECT * FROM product WHERE id_pro = ".$id_pro;
    $pro = pdo_query_one($sql);
    return $pro;
}
function update_pro($id_pro, $name_pro, $price, $discount, $short_des, $detail_des, $img_pro, $idcate) { 
        if($img_pro != '') {
        $sql = "UPDATE product SET 
        name_pro = '$name_pro', 
        price = '$price', 
        discount = '$discount',
        short_des = '$short_des',
        detail_des = '$detail_des',
        img_pro = '$img_pro', 
        idcate = '$idcate' 
        WHERE id_pro =" . $id_pro; 
        }
    else {
        $sql = "UPDATE product SET 
        name_pro = '$name_pro', 
        price = '$price', 
        discount = '$discount',
        short_des = '$short_des',
        detail_des = '$detail_des',
        idcate = '$idcate' 
        WHERE id_pro=" . $id_pro; 
    }
    pdo_execute($sql);
}
function remove_pro($id_pro) { 
    $sql = "DELETE FROM product WHERE id_pro=".$id_pro;
    pdo_execute($sql);
}
function filter_by_cate($id_pro, $idcate)
{
    $sql = "SELECT * FROM product WHERE idcate =" . $idcate ." AND id_pro <> ".$id_pro ;
    $listpro = pdo_query($sql);
    return $listpro;
}
// function loadall_pro() { 
//     $sql = "SELECT * FROM product ORDER BY id_pro DESC";
//     $listpro = pdo_query($sql);
//     return $listpro;
// }
?>