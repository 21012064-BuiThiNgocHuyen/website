<?php
    $sql_product = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc ='$_GET[id]' ORDER BY id_sanpham DESC";
    $query_product = mysqli_query($mysqli, $sql_product);
    // get tên danh mục
    $sql_cate = "SELECT * FROM danhmucsp WHERE danhmucsp.id_danhmuc ='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
    <h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?></h3>
    <ul class="list_items">
        <?php
         while($row_product = mysqli_fetch_array($query_product)){
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php  echo $row_product['id_sanpham']?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_product['hinhanh'] ?>" alt="">
                <p class="title_items">Tên sản phẩm: <?php echo $row_product['tensanpham'] ?></p>
                <p class="price">Giá: <?php echo number_format($row_product['giasp'],0,',','.').'vnđ' ?></p>
            </a>            
        </li>
        <?php
        }
        ?>
    </ul>