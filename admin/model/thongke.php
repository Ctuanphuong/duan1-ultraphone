<?php
function loadall_statis()
{
    $sql = "SELECT c.id_cate as idcate, c.name_cate as namecate, count(p.id_pro) as pro_quantity, min(p.price) as min_price, max(p.price) as max_price, avg(p.price) as avg_price";
    $sql .= " FROM product p LEFT JOIN category c ON c.id_cate = p.idcate";
    $sql .= " GROUP BY c.id_cate ORDER BY c.id_cate DESC";
    $liststatis = pdo_query($sql);
    return $liststatis;
}

function thonngke()
{
    $sql = "SELECT *,COUNT(product.name_pro) AS sluong FROM product INNER JOIN category ON product.idcate = category.id_cate GROUP BY category.name_cate;";
    $a = pdo_query($sql);
    return $a;
}

function ngay()
{
    $sql = "SELECT SUM(`total_amount`) FROM `bill` WHERE `status_pay` = '1' AND `order_date` >= NOW() - INTERVAL 1 DAY ";
    $liststatis = pdo_query_value($sql);
    return $liststatis;
}
function tuan()
{
    $sql = "SELECT SUM(`total_amount`) FROM `bill` WHERE `status_pay` = '1' AND `order_date` >= NOW() - INTERVAL 1 WEEK ";
    $liststatis = pdo_query_value($sql);
    return $liststatis;
}
function thang()
{
    $sql = "SELECT SUM(`total_amount`) FROM `bill` WHERE `status_pay` = '1' AND `order_date` >= NOW() - INTERVAL 1 MONTH ";
    $liststatis = pdo_query_value($sql);
    return $liststatis;
}
function nam()
{
    $sql = "SELECT SUM(`total_amount`) FROM `bill` WHERE `status_pay` = '1' AND `order_date` >= NOW() - INTERVAL 1 YEAR ";
    $liststatis = pdo_query_value($sql);
    return $liststatis;
}

function tungthang($a)
{
    $sql = "SELECT SUM(`total_amount`) as soluong FROM `bill` WHERE `status_pay` = '1' AND Month(order_date) = '$a' ";
    $liststatis = pdo_query_value($sql);
    return $liststatis;
}
// select SUM(`total_amount`) from bill where order_date >now() - interval 1 month

// STR_TO_DATE("10-17-2021 15:40:10", "%d-%m-%Y %H:%i:%s");

// SELECT STR_TO_DATE(order_date, "%Y-%m-%d %h:%i:%s") from bill

// SELECT SUM(`total_amount`) FROM bill WHERE MONTH(STR_TO_DATE(order_date, "%d-%m-%Y %h:%i:%s");
// ) = MONTH(NOW() - INTERVAL 1 MONTH) AND YEAR(STR_TO_DATE(order_date, "%d-%m-%Y %h:%i:%s");
// )= YEAR(NOW());
// $sql="SELECT SUM(`total_amount`) FROM bill WHERE STR_TO_DATE(order_date, "%d-%m-%Y %h:%i:%s");
// BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
//$sql="SELECT * FROM notes   where time >= CURRENT_TIMESTAMP -30";
//$sql="select * FROM notesWHERE   time  BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY)AND NOW()";

 
 //$sql="  SELECT  * FROM   notes WHERE  time BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()";

//$sql=" select SUM(`total_amount`) from bill where  time >now() - interval 1 month";
  // $sql="     SELECT * FROM   notes WHERE  user_id ='$user_id' and time > (NOW() - INTERVAL 1 MONTH)";
      //$sql=  "SELECT * FROM notes WHERE time BETWEEN now()    , DATE_SUB(NOW()    , INTERVAL 1 MONTH) ";