<p>Chi tiết đơn hàng</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step "> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step "> <span><a href="index.php?quanly=vanchuyen" >Thông tin vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=chitietdonhang" >Lịch sử đơn hàng</a><span> </div>
  </div>
</div>

<h3>Đơn hàng đã đặt</h3>
<?php 
$id_khachhang = $_SESSION['id_khachhang'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart, tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky AND tbl_cart.id_khachhang = '$id_khachhang'
     ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border="1" style="width: 80%; border-collapse:collapse; margin:auto"  >
  <tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ nhận hàng</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Quản lý</th>
  </tr>
  <?php 
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['sodienthoai'] ?></td>
    <!-- <td><?php echo $row['cart_date'] ?></td> -->
    <td>
      <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart']?>">Xem đơn hàng</a> 
    </td>
  </tr>
<?php 
}
?>
  
</table>