<?php 
function insert_bill($id_user, $user_name, $full_name, $address, $phone, $email, $payment, $order_date, $total_amount)
{
    $sql = "INSERT INTO bill(id_user, user_name, full_name, address, phone, email, payment, order_date, total_amount) values ('$id_user','$user_name', '$full_name', '$address', '$phone', '$email', '$payment', '$order_date',' $total_amount')";
    return pdo_execute_return_lastInsertId($sql);
}
function loadone_bill($id_bill)
{
    $sql = "SELECT * FROM bill WHERE id_bill=" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill;
}
?>