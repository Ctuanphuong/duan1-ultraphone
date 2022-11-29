 <!-- phần active trang đang được hiển thị-->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="breadcrumb-content">
             <ul>
                 <li><a href="index.php">Trang chủ</a></li>
                 <li class="active">Hỏi đáp</li>
             </ul>
         </div>
     </div>
 </div>
 <!--end phần active trang đang được hiển thị-->

 <!-- show form đăng nhập và đăng ký-->
 <div class="jb-login-register_area">
     <div class="container">
         <div>

         </div>
         <div class="row" style="justify-content: center;">
             <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                 <!-- form đăng nhập-->
                 <form action="index.php?act=question" method="post">
                     <div class="login-form">
                         <h2 style="text-align: center;">Hỏi đáp</h2>
                         <div class="row">
                            <div class="col-md-12 col-12">
                                 <labe style="font-weight: 700;">Họ và tên</labe>
                                 <input type="text" name="user_name" placeholder="Nhập họ và tên của bạn">
                             </div>
                             <div class="col-md-12 col-12">
                                 <labe style="font-weight: 700;">Email</labe>
                                 <input type="email" name="email" placeholder="Nhập  địa chỉ email của bạn">
                             </div>
                             <div class="col-md-12 col-12">
                                 <labe style="font-weight: 700;">Số điện thoại</labe>
                                 <input type="text" name="phone" placeholder="Nhập số điện thoại của bạn">
                             </div>
                             <div class="col-md-12 col-12">
                                 <labe style="font-weight: 700;">Câu hỏi</labe> <br>
                                 <textarea style="width:500px; height: 100px; padding: 10px 15px; border-radius: 8px" placeholder="Nhập câu hỏi của bạn..."></textarea>
                             </div>                          
                             <div class="col-12 wrap-btn-sub" >
                                 <input type="submit"  class="btn-submit" name="btn_question" value="Gửi" style="margin-top: 30px;">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>