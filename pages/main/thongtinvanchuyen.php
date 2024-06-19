<p>Thông tin vận chuyển</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Thông tin vận chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=chitietdonhang" >Lịch sử đơn hàng</a><span> </div>
  </div>


  <h3>Thông tin vận chuyển</h3>
  <?php
    if(isset($_POST['themvanchuyen'])){
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $id_dangky = $_SESSION['id_khachhang'];
      $sql_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_vanchuyen(name,phone,address,id_dangky) VALUES ('$name', '$phone', '$address', '$id_dangky')");
      if($sql_vanchuyen){
        echo '<script>alert("Cập nhật thông tin vận chuyển thành công")</script>';
      }
    }elseif(isset($_POST['capnhatvanchuyen'])){
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $id_dangky = $_SESSION['id_khachhang'];
      $sql_capnhatvanchuyen = mysqli_query($mysqli,"UPDATE tbl_vanchuyen SET name = '$name',phone = '$phone',address = '$address',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
      if($sql_capnhatvanchuyen){
        echo '<script>alert("Cập nhật lại thông tin vận chuyển thành công")</script>';
      }
    }
  ?>
  
  <div class="row">
    <?php
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_ttvanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_vanchuyen WHERE id_dangky = '$id_dangky' LIMIT 1");
    $count = mysqli_num_rows($sql_ttvanchuyen);
    if($count > 0){
      $row_ttvanchuyen = mysqli_fetch_array($sql_ttvanchuyen);
      $name = $row_ttvanchuyen['name'];
      $phone = $row_ttvanchuyen['phone'];
      $address = $row_ttvanchuyen['address'];
    }else{
      $name = '';
      $phone = '';
      $address= '';
    }
    ?>
    <div class="col-md-8">
      <form action="" autocomplete="off" method="post">
        <div class="form-group">
          <label for="email">Tên khách hàng:</label>
          <input type="text" name="name" value="<?php echo $name ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label for="std">Số điện thoại:</label>
          <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label for="diachi">Địa chỉ nhận hàng:</label>
          <input type="text" name="address" value="<?php echo $address ?>" class="form-control" >
        </div>
        
        <?php 
        if($name==''&& $phone == ''){
        ?>
        <button type="submit" name="themvanchuyen" class="btn btn-primary">Cập nhật</button>
        <?php 
         }elseif($name !=''&& $phone != ''){
        ?>
        <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật lại</button>
          <?php
         }
         ?>
      </form>
    </div>
  </div>
  <!-- -----Gio hàng -------- -->
  <table>
    <tr>
        <th>ID</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
  
    </tr>
    <?php
    if(isset($_SESSION['cart'])){
        $i=0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
            $tongtien += $thanhtien;
            $i++;  
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
        <td>
            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa-solid fa-plus"></i></a>
            <?php echo $cart_item['soluong']?>
            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa-solid fa-minus"></i></a>
        </td>
        <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'vnđ'; ?></td>
       
    </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="8">
            <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br/>
            <div style="clear: both;"> </div>
            <?php 
                if(isset($_SESSION['dangky'])){
            ?>
                    <p class="dathang"><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
            <?php 
                }else{
            ?>
                    <p><a href="index.php?quanly=dangky">Đăng ký</a></p>
            <?php
                }
            ?>
            
        </td>
    </tr>
    <?php
    }else{
    ?>
    <tr>
        <td colspan="8">Giỏ hàng trống</td>
    </tr>
    <?php
    }
    ?>
</table>
  
</div>