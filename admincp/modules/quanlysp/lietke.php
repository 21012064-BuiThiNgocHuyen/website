<?php 
$limit = 5;
$page = isset($_GET['trang']) ? intval($_GET['trang']) : 1;

if ($page <= 0) {
    $page = 1;
}


$begin = ($page - 1) * $limit;

    $sql_lietke_sp = "SELECT * FROM tbl_sanpham,danhmucsp WHERE tbl_sanpham.id_danhmuc = danhmucsp.id_danhmuc ORDER BY id_sanpham DESC LIMIT $begin, $limit";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);

    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $total_pages = ceil($row_count / $limit);

?>
<h2>Liệt kê sản phẩm</h2>
<button type="button"><a href="index.php?action=quanlysp&query=them">Thêm</a></button>
<table style="width: 90%;border-collapse:collapse; margin:auto" border="1" >
  <tr>
    <th>ID</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã sản phẩm</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>

  </tr>
  <?php  
  $i = $begin + 1;
  while($row = mysqli_fetch_array($query_lietke_sp)){
   
  ?>
  <tr>
    <td><?php echo $i++ ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="200px" height="180px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php
    if($row['tinhtrang']==1){
        echo "Kích hoạt";
    }else{
      echo "Ẩn";
    }
    ?>

    </td>
    <td>
      
      <a class="button" onclick="return deleteSP('<?php echo $row['id_sanpham']?>')" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a> |
      <a class="button" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
    </td>
  </tr>
<?php 
}
?>
  
</table>
<script>
        function deleteSP(id){
            return confirm ("Bạn có chắc chắn muốn xóa không ?")
        }
</script>
<div style="clear: both;"></div>
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
    <a href='index.php?action=quanlysp&query=lietke&trang=<?php echo $i; ?>'><?php echo $i; ?></a>
  </li>
  <?php
  }
  ?>
</ul>