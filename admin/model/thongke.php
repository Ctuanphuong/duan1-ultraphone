<?php 
function loadall_statis()
{
    $sql = "SELECT c.id_cate as idcate, c.name_cate as namecate, count(p.id_pro) as pro_quantity, min(p.price) as min_price, max(p.price) as max_price, avg(p.price) as avg_price";
    $sql .= " FROM product p LEFT JOIN category c ON c.id_cate = p.idcate";
    $sql .= " GROUP BY c.id_cate ORDER BY c.id_cate DESC";
    $liststatis = pdo_query($sql);
    return $liststatis;
}
?>