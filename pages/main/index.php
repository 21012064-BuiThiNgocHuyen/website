<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;

    }else{
        $begin = ($page*15)-15;
    }
    $sql_product = "SELECT * FROM tbl_sanpham,danhmucsp WHERE tbl_sanpham.id_danhmuc =danhmucsp.id_danhmuc ORDER BY tbl_sanpham.id_sanpham 
    DESC LIMIT $begin,15";
    $query_product = mysqli_query($mysqli, $sql_product);
           
?>
<h3>Sản phẩm mới nhất</h3>
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
    <div style="clear: both;"></div>
    <style>
        .list_pages{
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .list_pages li{
            float: left;
            padding: 5px 13px;
            margin: 5px;
            background: lightblue;
            display: block;
        }
        .list_pages li a{
            color: #000;
            text-align: center;
            text-decoration: none;
        }

    </style>
    <?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/15);
    ?>
    <ul class="list_pages">
        <?php
        for($i=1; $i<=$trang; $i++){
        ?>
        <li <?php 
         if($i==$page){
            echo 'style="background:blue;"';
        }else{echo '';} 
        ?>>
        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
    </ul>