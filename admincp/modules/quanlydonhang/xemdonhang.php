<p>Xem đơn hàng</p>
<?php
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details, tbl_sanpham WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham 
    AND tbl_cart_details.code_cart = '$_GET[code]'
    ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="border-collapse:collapse;" border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng </th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
        $i=0;
        $tongtien = 0;
        while($row = mysqli_fetch_array($query_lietke_dh)){
            $i++;
            $thanhtien= $row['giasp']* $row['soluongmua'];
            $tongtien += $thanhtien;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_cart']?></td>
        <td><?php echo $row['tensanpham']?></td>
        <td><?php echo $row['soluongmua']?></td>
        <td><?php echo number_format($row['giasp'],0,',',',').' VNĐ'?></td>
        <td><?php echo number_format($thanhtien,0,',',',').' VNĐ'?></td>
        
    </tr>
    <?php    }
    ?>
    <td colspan="6">
       <p>Tổng tiền: <?php echo number_format($tongtien,0,',',',').' VNĐ'?> </p>
    </td>
</table>