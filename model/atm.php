<?php
require_once '../model/function.php';

    // $token = '3A765E81-CC3A-63CF-B903-903CB9AD0DBF'; // NHẬP TOKEN MOMO VÀO ĐÂY
    $result = curl_get("https://api.doquanglinh.club/");
    $result = json_decode($result, true);
    // echo $result['momoMsg']['tranList'];
    foreach($result['transactionHistoryList'] as $data)
    {
        $comment        = $data['description'];             // NỘI DUNG CHUYỂN TIỀN
        $tranId         = $data['refNo'];                 // MÃ GIAO DỊCH
        $id       = parse_order_id($comment);         // TÁCH NỘI DUNG CHUYỂN TIỀN
        $amount         = $data['creditAmount'];
        $money          = $amount;
        // $suduvi           = $data['CurrentBalance'];
        //Xử lý giao dịch
        if ($id)
        {
        //echo $tranId;
            $check_code = $conn->query("SELECT * FROM bank WHERE tid = '$tranId' ");
            $check_username = $conn->query("SELECT * FROM users WHERE id = '$id'  ");
            if($check_username)
            {
                $array_user = $check_username->fetch_array();
                // echo $array_user['username'];
                if($check_code->fetch_assoc() == 0)
                {
                    $money = str_replace(',', '', $money);
                    $create = $conn->query("INSERT INTO bank SET 
                        `tid` = '$tranId',
                        `username` = '".$array_user['username']."',
                        `description` = '$comment',
                        `time` = now(),
                        `amount` = '$money'");
                    if ($create)
                    {
                        $conn->query("INSERT INTO `log` SET 
                        `content`= '+ ".$amount." lý do: Nạp ATM Auto  #".$tranId." ',
                        `createdate` = now(),
                        `username`= '".$array_user['username']."' ");
                        $conn->query("UPDATE users SET 
                        `vnd` = `vnd` + '".$money."',
                        `total_nap` = `total_nap` + '".$money."' WHERE `username` = '".$array_user['username']."' ");
                    }
                }
            }
        }
    }
    //echo "<div>Xử lý hoàn tất</div>";
?>