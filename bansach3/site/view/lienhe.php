<?php
    include_once 'inc/header.php';
    
    //Phan hồi khách hàng.
    include_once("controller/users_controller.php");
    $c_users = new users_controller();
    if(isset($_POST['themphanhoi'])){
        if($_POST['email'] != ""){
            $email =$_POST['email'];
            $hoten  = $_POST['hoten'];
            if($_POST['noidung'] != ""){
                $noidung = $_POST['noidung'];
                $comment = $c_users->themphanhoi($hoten,$email, $noidung);
                unset($_SESSION['chuadangnhap']);
            }
            else{
                unset($_SESSION['respone_msg']);
                $_SESSION['chuadangnhap'] = "không thể bỏ trống nội dung trên";
            }
        }
        else{
             $_SESSION['chuadangnhap']= "Vui lòng điền email để nhận phản hồi.";
        }
    }
  ?>
 <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                       <li ><a href="?controller=index">Trang chủ</a></li>
                        <li><a href="?controller=shop">Cửa hàng</a></li>
                      
                        <li ><a href="?controller=cart">Giỏ hàng</a></li>
                        <li><a href="?controller=checkout">Thanh toán</a></li>
                        <li class="active"><a href="?controller=contact">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Liên hệ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <strong><h3 style="text-align: center; margin-top: 20px; color:green" id="phanhoi">Cảm ơn bạn đã gửi phản hồi cho chúng tôi</h3></strong>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
    <div class="well" style="margin-top: 10%;">
    <h3>Để lại tin nhắn cho chúng tôi</h3>
    <form role="form" id="contactForm" data-toggle="validator" class="shake" action="#" method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="name" class="h4">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="hoten" placeholder="Nhập tên" required data-error="Vui lòng nhập tên của bạn." required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6">
                <label for="email" class="h4">Địa chỉ email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="h4 ">Tin nhắn</label>
            <textarea id="message" class="form-control" rows="5" name="noidung" placeholder="Enter your message" required></textarea>
            <div class="help-block with-errors"></div>
        </div>
        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right " name="themphanhoi">Gửi</button>
 
    </form>
    </div>
    <?php
        if(isset($_SESSION['respone_msg'])){
            echo "<div class='alert alert-success'>".$_SESSION['respone_msg']."</div>";
        }
    ?>
</div>
</div>

<?php
    include 'inc/footer.php'
  ?>