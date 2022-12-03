<?php
function loadall_user()
{
    $sql = "SELECT * FROM user ORDER BY id_user DESC";
    $listuser = pdo_query($sql);
    return $listuser;
}
function loadone_user($id_user)
{
    $sql = "SELECT * FROM user WHERE id_user=" . $id_user;
    $user = pdo_query_one($sql);
    return $user;
}
function update_user($id_user, $user_name, $full_name, $email_user, $password, $role)
{
    $sql = "UPDATE user SET
    user_name='$user_name',
    full_name='$full_name',  
    email_user='$email_user',
    password='$password', 
    role='$role' 
    WHERE id_user=".$id_user;
    pdo_execute($sql);
}
function delete_user($id_user) { 
    $sql = "DELETE FROM user WHERE id_user=".$id_user;
    pdo_execute($sql);
}
function countusser()
{
    $sql = "SELECT count(*) FROM user";
    $a = pdo_query($sql);
    return $a;
}
// function check_user_admin($user_name, $password)
// {
//     $sql = "SELECT * FROM user WHERE ((user_name ='$user_name') OR (email_user ='$user_name')) AND password = '$password'";
//     $user = pdo_query_one($sql);
//     return $user;
// }
function check_user_admin($user_name, $password)
{
    $sql = "SELECT * FROM user WHERE ((user_name ='" . $user_name . "') OR (email_user ='" . $user_name . "')) AND password = '" . $password . "' AND role = '1'";
    $user = pdo_query_one($sql);
    return $user;
}