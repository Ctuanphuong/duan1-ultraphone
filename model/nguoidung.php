<?php 
function register($user_name, $full_name, $email_user, $password) { 
    $sql = "INSERT INTO user (user_name, full_name, email_user, password) VALUES ('$user_name','$full_name','$email_user','$password')";
    pdo_execute($sql);
}
function check_user($user_name, $password) { 
    $sql = "SELECT * FROM user WHERE ((user_name ='$user_name') OR (email_user ='$user_name')) AND password = '$password'";
    $user = pdo_query_one($sql);
    return $user;
}
?>