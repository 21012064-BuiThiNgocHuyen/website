<p>Liệt kê đơn hàng</p>
<?php
    $limit = 10;
    $page = isset($_GET['trang']) ? intval($_GET['trang']) : 1;
    
    if ($page <= 0) {
        $page = 1;
    }
    
    
    $begin = ($page - 1) * $limit;

    $sql_lietke_dh = "SELECT * FROM tbl_cart, tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC LIMIT $begin, $limit";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_cart");
    $row_count = mysqli_num_rows($sql_trang);
    $total_pages = ceil($row_count / $limit);
?>
<table style="border-collapse:collapse;" border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Tình trạng</th>
        <th>Ngày đặt hàng</th>
        <th>Quản lý</th>
    </tr>
    <?php
        $i=0;
        while($row = mysqli_fetch_array($query_lietke_dh)){
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_cart']?></td>
        <td><?php echo $row['tenkhachhang']?></td>
        <td><?php echo $row['diachi']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['sodienthoai']?></td>
        <td>
            <?php 
                if($row['cart_status']==1){
                    echo '<a href="modules/quanlydonhang/xuly.php?cart_status=0&code='.$row['code_cart'].'">Đơn hàng mới</a>';
                }else{
                    echo 'Đã xử lý';
                }
            ?>
        </td>
        <td><?php echo $row['cart_date']?></td>
        <td>
            <a href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['code_cart']?>">Xem đơn hàng</a>  
        </td>
    </tr>
    <?php    }
    ?>

</table>
<style>
    .list_pages {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    .list_pages li {
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background: lightblue;
        display: block;
    }
    .list_pages li a {
        color: #000;
        text-align: center;
        text-decoration: none;
    }
    td{
      text-align: center;
    }
</style>

<ul class="list_pages">
  <?php
  for ($i = 1; $i <= $total_pages; $i++) {
  ?>
  <li <?php if ($i == $page) { echo 'style="background:blue;"'; } ?>>
    <a href='index.php?action=quanlydonhang&query=lietke&trang=<?php echo $i; ?>'><?php echo $i; ?></a>
  </li>
  <?php
  }
  ?>
</ul>