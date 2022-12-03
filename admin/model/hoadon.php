<?php 
function loadall_bill($iduser)
{
    $sql = "SELECT * FROM bill"; 
    if($iduser > 0) $sql .=" AND id_user= ".$iduser ; 
    $sql .= " ORDER BY id_bill DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}
function remove_bill($idbill)
{
    $sql = "DELETE FROM bill WHERE id_bill=" . $idbill;
    pdo_execute($sql);
}
function loadone_bill($idbill) { 
    $sql = "SELECT * FROM bill WHERE id_bill =".$idbill;
    $one_bill = pdo_query_one($sql);
    return $one_bill;
}

function load_cart_all($idbill) { 
    $sql = "SELECT * FROM `cart` WHERE id_bill=".$idbill;
    $ab = pdo_query($sql);
    return $ab;
}
function update_bill($id_bill, $status, $status_pay){ 
    $sql = "UPDATE bill SET status = '$status', status_pay = '$status_pay' WHERE id_bill=" . $id_bill;
    pdo_execute($sql);
}
?>