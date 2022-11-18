<?php 
function loadall_cate() { 
    $sql = "SELECT * FROM category ORDER BY id_cate DESC";
    $listcate = pdo_query($sql);
    return $listcate;
}
function load_namecate($idcate) {
    if ($idcate > 0 ) { 
        $sql = "SELECT * FROM category WHERE id_cate=" .$idcate;
        $cate = pdo_query_one($sql);
        extract($cate);
        return $name_cate;
    }  else { 
        return " ";
    }
    }
?>