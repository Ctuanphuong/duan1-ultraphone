<?php 
function loadall_cmt() { 
    $sql = "SELECT * FROM comment c inner join product p on c.id_pro = p.id_pro ORDER BY id_cmt DESC";
    $listcmt = pdo_query($sql);
    return $listcmt;
}
function remove_cmt($id_cmt) { 
    $sql = "DELETE FROM comment WHERE id_cmt=".$id_cmt;
    pdo_execute($sql);
}
?>