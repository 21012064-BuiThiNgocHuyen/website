<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_product = "SELECT * FROM tbl_sanpham, danhmucsp WHERE tbl_sanpham.id_danhmuc = danhmucsp.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_product = mysqli_query($mysqli, $sql_product);
         
?>
<h3>Từ khóa tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
    <ul class="list_items">
        <?php
        while($row = mysqli_fetch_array($query_product)){
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php  echo $row['id_sanpham']?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
                <p class="title_items">Tên sản phẩm: <?php echo $row['tensanpham'] ?></p>
                <p class="price">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
                <p style="text-align:center; color: #ddd"><?php echo $row['tendanhmuc'] ?></p>
            </a>            
        </li>
        <?php
        }
        ?>
        
    </ul>