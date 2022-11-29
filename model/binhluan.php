<?php 
function insert_comment($content, $id_user, $user_name, $full_name, $idpro, $comment_date)
{
    $sql = "INSERT INTO comment (content, id_user, user_name, full_name, id_pro, comment_date) VALUES ('$content', '$id_user', '$user_name','$full_name','$idpro', '$comment_date')";
    pdo_execute($sql);
}
function loadall_comment($idpro)
{
    $sql = "SELECT * FROM comment WHERE id_pro = '$idpro' ORDER BY id_cmt desc limit 0,8";
    $listcmt= pdo_query($sql);
    return $listcmt;
}
?>