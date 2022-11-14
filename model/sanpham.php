<?php 
function loadall_pro_home()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY id_pro desc limit 0,8";
    $listpro= pdo_query($sql);
    return $listpro;
}
?>