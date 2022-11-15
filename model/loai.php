<?php 
function loadall_cate() { 
    $sql = "SELECT * FROM category ORDER BY id_cate DESC";
    $listcate = pdo_query($sql);
    return $listcate;
}
?>