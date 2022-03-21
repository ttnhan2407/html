<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
 <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>
<body>
<div class="container"> 
 <h1 class="text-center">THÊM SẢN PHẨM</h1> 
 <div class="row"> 
  <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
   <form action="" method="post" class="form" role="form" enctype="multipart/form-data"> 
        <?php 
            if(isset($add)) echo $add;
        ?>
   		 <input class="form-control" name="name" placeholder="Tên sản phẩm"  type="text">
      <br>
      <input class="form-control" name="author" placeholder="Tác giả" type="text">
      <br>
      <input class="form-control" name="price1" placeholder="Giá gốc" type="number">
      <br>
      <input class="form-control" name="price2" placeholder="Giá bán" type="number">   
      <br>
      <input class="form-control" name="category" placeholder="Thể loại" type="text">   
      <br>
      <textarea class="form-control" name="content" placeholder="Mô tả..."></textarea>  
      <br>
      <input class="form-control" name="image" placeholder="Hình ảnh" type="file"> 
      <p><strong>Lưu ý:</strong>Kích thước file ảnh(chỉ cho phép đuôi jpg,jpeg,png,gif) tối đa 2MB.</p>  
      <br>
      <input class="form-control" name="quantity" placeholder="Số lượng" value="<?php echo $row['quantity'] ?>" type="number" min=1>
      <br>   
      <br>
      
    <div class="row"> 
     
    </div>
    <br> 
    <br> 
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="add"> Thêm</button> 
   </form> 
 </div>
</div>
</body>
</html>