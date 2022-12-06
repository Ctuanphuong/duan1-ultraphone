<?php
session_start();
$_SESSION['check'] = 1;

if ($_SESSION['check'] == 2) {
    header("location: index.php?act=billconfirm");
}

if (isset($_SESSION['pay'])) {

    $amount = $_SESSION['pay'][1];
    $commnet = $_SESSION['pay'][2];
    $payment = $_SESSION['pay'][0];
}

?>
<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head id="j_idt2">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>Thanh toán hoá đơn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="all,follow">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <link rel="stylesheet" href="https://muaclonefb.com/assets/libs/bootstrap.min.css" />
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://muaclonefb.com/assets/libs/style.default.css" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://muaclonefb.com/assets/libs/style-version=1.0.css" />
    <link rel="stylesheet" href="https://muaclonefb.com/assets/css/qr-code.css" />
    <link rel="stylesheet" href="https://muaclonefb.com/assets//libs/qr-code-tablet.css" />
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://muaclonefb.com/assets/libs/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Cute Alert -->
    <link class="main-stylesheet" href="https://muaclonefb.com/assets/libs/style.css" rel="stylesheet" type="text/css">
    <script src="https://muaclonefb.com/assets/libs/cute-alert.js"></script>
    <!-- jQuery -->
    <script src="https://muaclonefb.com/assets//libs/jquery-3.6.0.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/upload/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/upload/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/upload/favicon.png">
    <style type="text/css">
        .container-fluid {
            width: 40% !important;
            min-width: 750px !important;
        }

        .info-box {
            min-height: 600px;
        }

        .entry {
            border-bottom: 1px solid #424242;
        }

        .left {
            background-color: #262626;
        }

        .receipt {
            border-bottom: 1px solid #424242
        }
    </style>
</head>

<body>
    <div class="spinner" id="spinner" style="display: none;">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div id="page">
        <div class="container">
            <div class="row">
                <?php if ($payment == 2) { ?>
                    <div class="col-xs-12 col-sm-12 col-md-4 left">
                        <div class="info-box">
                            <div class="entry">
                                <p><i class="fa fa-university" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Phương thức</span>
                                    <br>
                                    <span style="padding-left: 25px;word-break: keep-all;">Ngân hàng</span>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-university" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Ngân hàng</span>
                                    <br>
                                    <span style="padding-left: 25px;word-break: keep-all;">MB Bank</span>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Số tài khoản</span>
                                    <br>
                                    <b id="copyStk" style="padding-left: 25px;word-break: keep-all;color:greenyellow;">60000000003</b>
                                    <i onclick="copy()" data-clipboard-target="#copyStk" class="fas fa-copy copy"></i>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-user" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Chủ tài khoản</span>
                                    <br>
                                    <span style="padding-left: 25px;word-break: keep-all;">Đỗ Quang Linh</span>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-money" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Số tiền cần thanh toán</span>
                                    <br>
                                    <b style="padding-left: 25px;color:aqua;"><?= number_format($amount) ?> đ</b>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-comment" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Nội dung chuyển khoản</span>
                                    <br>
                                    <b id="copyNoiDung" style="padding-left: 25px;word-break: keep-all;color:yellow;"><?= $commnet ?></b>
                                    <i onclick="copy()" data-clipboard-target="#copyNoiDung" class="fas fa-copy copy"></i>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-barcode" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Trạng thái <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                    <br>

                                    <span id="status_payment" style="padding-left: 25px;word-break: break-all;">
                                        <p class="mb-0 text-warning font-weight-bold d-flex justify-content-start align-items-center mt-5" style="margin-top: 20%">
                                            <!-- <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                                                    <circle cx="12" cy="12" r="8" fill="#db7e06"></circle>
                                                </svg>
                                            </small>Sau Khi Thanh Toán Thành Công Vui Lòng Quay Lại Trang Chủ Chờ Khoảng 3p Tiền Sẻ Được Tự Động Cập Nhật -->
                                            <a href="../index.php?act=billconfirm" class="text-white">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                <span>Quay lại</span></a>
                                        </p>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 right">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="message" id="loginForm">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="qr-code">
                                                    <div class="payment-cta">
                                                        <div>
                                                            <h1>Quét mã QR để thanh toán</h1>
                                                        </div>
                                                        <a>Sử dụng <b> App Internet Banking </b> hoặc ứng dụng camera hỗ trợ
                                                            QR code để
                                                            quét mã</a>
                                                    </div>
                                                    <img src="https://api.viqr.net/vietqr/MBBank/60000000003/<?= $amount ?>/full.jpg?NDck=<?= $commnet ?>&FullName=DO%20QUANG%20LINH" width="100%">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-xs-12 col-sm-12 col-md-4" style="background-color: #a50064; color:white">
                        <div class="info-box">
                            <div class="entry">
                                <p><i class="fa fa-university" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Phương thức</span>
                                    <br>
                                    <span style="padding-left: 25px;word-break: keep-all;">MOMO</span>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Số điện thoại</span>
                                    <br>
                                    <b id="copyStk" style="padding-left: 25px;word-break: keep-all;color:greenyellow;">0335535000</b>
                                    <i onclick="copy()" data-clipboard-target="#copyStk" class="fas fa-copy copy"></i>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-user" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Chủ tài khoản</span>
                                    <br>
                                    <span style="padding-left: 25px;word-break: keep-all;">Đỗ Quang Linh</span>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-money" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Số tiền cần thanh toán</span>
                                    <br>
                                    <b style="padding-left: 25px;color:aqua;"><?= number_format($amount) ?> đ</b>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-comment" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Nội dung chuyển khoản</span>
                                    <br>
                                    <b id="copyNoiDung" style="padding-left: 25px;word-break: keep-all;color:yellow;"><?= $commnet ?></b>
                                    <i onclick="copy()" data-clipboard-target="#copyNoiDung" class="fas fa-copy copy"></i>
                                </p>
                            </div>
                            <div class="entry">
                                <p><i class="fa fa-barcode" aria-hidden="true"></i>
                                    <span style="padding-left: 5px;">Trạng thái <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                    <br>

                                    <span id="status_payment" style="padding-left: 25px;word-break: break-all;">
                                        <p class="mb-0 text-warning font-weight-bold d-flex justify-content-start align-items-center mt-5" style="margin-top: 20%">
                                            <!-- <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                                                    <circle cx="12" cy="12" r="8" fill="#db7e06"></circle>
                                                </svg>
                                            </small>Sau Khi Thanh Toán Thành Công Vui Lòng Quay Lại Trang Chủ Chờ Khoảng 3p Tiền Sẻ Được Tự Động Cập Nhật -->
                                            <a href="../index.php?act=billconfirm" class="text-white">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                <span>Quay lại</span></a>
                                        </p>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 right">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="message" id="loginForm">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="qr-code">
                                                    <div class="payment-cta">
                                                        <div>
                                                            <h1>Quét mã QR để thanh toán</h1>
                                                        </div>
                                                        <a>Sử dụng <b> App MOMO </b> hoặc ứng dụng camera hỗ trợ
                                                            QR code để
                                                            quét mã</a>
                                                    </div>
                                                    <img src="https://quickchart.io/qr?text=2|99|0335535000|DO QUANG LINH||0|0|<?= $amount ?>|<?= $commnet ?>|transfer_myqr&ecLevel=H&size=1000" width="50%" style="margin-top:20%">

                                                    <div>
                                                        <span class="mt-5"><i class="fa fa-spinner fa-spin"></i> Đang chờ bạn quét ...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <div class="container-fluid hidden-xs">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="copyrights text-center">
                        <p style="color: #737373;   font-size: 11pt; font-weight: bold;">
                            <br>
                            Vui lòng thanh toán vào thông tin tài khoản trên để hệ thống xử lý hoá đơn tự động.
                        </p>
                        <a href="?act=billconfirm">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <span>Quay lại</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://muaclonefb.com/assets//libs/tracking-version=1.2.js"></script>
    <script src="https://muaclonefb.com/assets//libs/jquery.min.js"></script>
    <script src="https://muaclonefb.com/assets//libs/tether.min.js"></script>
    <script src="https://muaclonefb.com/assets//libs/bootstrap.min.js"></script>
    <script src="https://muaclonefb.com/assets//libs/m2.js"></script>
    <script type="text/javascript" src="https://muaclonefb.com/assets//libs/momo.js"></script>
    <script type="text/javascript" src="https://muaclonefb.com/assets//libs/ws.js"></script>
    <script src="https://muaclonefb.com/assets//libs/jquery.lazyload.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#page').show();
            $('#spinner').hide();
            $("img.lazy").show().lazyload();
        });
    </script>
    <script type="text/javascript">
        setInterval(function() {
            $('#status_payment').load(getStatusInvoice());
        }, 5000);
        new ClipboardJS(".copy");

        function copy() {
            cuteToast({
                type: "success",
                message: "Đã sao chép vào bộ nhớ tạm",
                timer: 5000
            });
        }
    </script>
</body>

</html>