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
function check_pass($name, $email ) { 
    $sql = "SELECT * FROM user WHERE user_name ='".$name."' AND email_user ='".$email."'";
    $pass = pdo_query_one($sql);
    return $pass;
}

function getUserEmail($email){
    $sql = "SELECT * FROM user where email_user = '$email'";
    $result = pdo_query_one($sql);
    if($result){
        return $result;
    }else{
        echo "<h4 style='color: red; text-align: center; margin-top: 10px;'>Email không tồn tại!</h4>";
    }
}
function forgetPass($password, $email){
    $sql = "UPDATE user SET password = '$password' WHERE email_user = '$email'";
    $result =  pdo_execute($sql);
}
?>