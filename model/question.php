<?php
    function question($name, $email, $phone, $contennt){
        $sql = "INSERT INTO `question`( `name`, `email`, `phone`, `contennt`) VALUES ('$name','$email','$phone','$contennt')";
        pdo_execute($sql);
    }
?>