<?php
    include_once "lib/session.php";
    include_once "lib/format.php";
    include_once 'model/admin.php';
    include_once 'model/db.php';
    include_once 'model/users.php';
    include_once 'model/products.php';
    $db=new Database();
    $product=new Product;
?>
<!DOCTYPE html>
<html>
<head>
  <meta content='30' http-equiv='refresh'/>  
  <title>Quản lí sản phẩm</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styleadmin.css">
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>
<body>
<div class="container"> 
 <div class="row"> 
  <h3 ><a href="index.php">Về HomePage</a></h3> 
  <div class="col-md-10 col-md-offset-1"> 
   <div class="panel panel-default panel-table"> 
    <div class="panel-heading"> 
     <div class="row"> 
      <div class="col col-xs-6"> 
       <h3 class="panel-title">Danh sách sản phẩm</h3> 
      </div> 
      <div class="col col-xs-6 text-right"> 
       <button type="button" class="btn btn-sm btn-primary btn-create"><a style="color: white;" href="?controller=product&action=add" target="_blank">Thêm mới</a></button> 
      </div> 
     </div> 
    </div> 
    <div class="panel-body"> 
     <table class="table table-striped table-bordered table-list"> 
      <thead> 
       <tr> 
        <th><em class="fa fa-cog"></em>
        </th> 
        <th class="hidden-xs">ID</th> 
        <th>Tên sản phẩm</th>
        <th>Tác giả</th>
        <th>Ảnh</th>
        <th>Thể loại</th>
        <th>Giá bán</th> 
        <th>Giá gốc</th> 
        <th>Số lượng trong kho</th>
       </tr> 
      </thead> 
      <tbody>
       <?php
              //Tải thông tin các thành viên
                if($result){
                    while ($row=$result->fetch_assoc()) {
        ?>
                       <!-- onclick="return confirm('Bạn có chắc muốn xóa không?')" -->
                    <td align="center"><a href="index.php?controller=product&action=edit&id= <?php  echo $row['id'];?>" target="_blank" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                      <a class="btn btn-danger" onclick="return confirm('Bạn chắc muốn xóa chứ?')" href="index.php?controller=product&action=delete&id= <?php  echo $row['id'];?>" ><em class="fa fa-trash"></em></a>
                    </td> 
                    <td class="hidden-xs"><?php  echo $row["id"]?></td> 
                    <td><?php  echo $row["name"]?></td> 
                    <td><?php  echo $row["author"]?></td> 
                    <td ><?php  echo '<img style="width: 70px;height: 70px" src="../img/'.$row["image_link"].'"/>'?></td>
                    <td><?php  echo $row["category"]?></td>
                    <td><?php  echo number_format($row["price2"])?></td>
                    <td><?php  echo number_format($row["price1"])?></td>
                    <td><?php  echo $row["quantity"]?></td> 
         
                    </tr>   
                    
                    
             <?php
                  }
                  } 
              ?>   
     </tbody>
   </table> 
    </div>  
   </div> 
  </div> 
 </div>
</div>
</body>
</html>