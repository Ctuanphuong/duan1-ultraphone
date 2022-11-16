<?php 
function loadall_cate() { 
    $sql = "SELECT * FROM category ORDER BY id_cate DESC";
    $listcate = pdo_query($sql);
    return $listcate;
}
function load_name_cate($idcate) { 
    if($idcate > 0) { 
        $sql = "SELECT * cate_name; category WHERE id_cate =".$idcate;
        $cate = pdo_query_one($sql);
        extract($cate);
        return $cate_name;
    } else { 
        return " ";
    }
}
?>