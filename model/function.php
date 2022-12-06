<?php 
$MEMO_PREFIX = " ";
function parse_order_id($des){
    global $MEMO_PREFIX;
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function checkcode($tranId) { 
    $sql = "SELECT * FROM history_bank WHERE tranid = '$tranId'";
    $a = pdo_query_one($sql);
    return $a;
}
function checkbill($id) { 
    $sql = "SELECT * FROM bill WHERE bill_code = '$id'";
    $a = pdo_query_one($sql);
    return $a;

}