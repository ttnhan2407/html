
<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật thông tin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>
<body>
<div class="container"> 
 <h1 class="text-center">CẬP NHẬT THÔNG TIN SẢN PHẨM</h1> 
 <div class="row"> 
  <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
   <form action="" method="post" class="form" role="form" enctype="multipart/form-data"> 
    <?php 
          if(isset($update)) echo $update;
     ?>
    <?php

        if(isset($result)){
          while($row=$result->fetch_assoc()){
     ?>
   		<input class="form-control" name="name" title="Tên sản phẩm" value="<?php echo $row['name'] ?>" required="" autofocus="" type="text">
   		<br>
   		<input class="form-control" name="author" title="Tác giả" value="<?php echo $row['author'] ?>" type="text">
   		<br>
   		<input class="form-control" name="price1" title="Giá gốc" value="<?php echo $row['price1'] ?>" type="number">
   		<br>
   		<input class="form-control" name="price2" title="Giá bán" value="<?php echo $row['price2'] ?>" type="number">   
   		<br>
   		<input class="form-control" name="category" title="Thể loại" value="<?php echo $row['category'] ?>" type="text">   
   		<br>
      <textarea class="form-control" name="content" title="Mô tả"><?php echo $row['content'] ?></textarea>  
      <br>
      <input class="form-control" name="image" title="Hình ảnh sản phẩm" placeholder="Hình ảnh" type="file"> 
      <p><strong>Lưu ý:</strong>Kích thước file ảnh(chỉ cho phép đuôi jpg,jpeg,png,gif) tối đa 2MB.</p> 
      <br>
      <input class="form-control" name="quantity" title="Số lượng sản phẩm" placeholder="Số lượng" value="<?php echo $row['quantity'] ?>" type="number" min=1>
      <br>
    <div class="row"> 
     
    </div>
    <br> 
    <br> 
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="update"> Cập nhật</button> 
   </form> 
   <?php
      }
    } 
    ?>
 </div>
</div>
</body>
</html>