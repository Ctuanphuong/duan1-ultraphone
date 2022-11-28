<?php 
function loadall_bill($iduser)
{
    $sql = "SELECT * FROM bill WHERE 1"; 
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
?>