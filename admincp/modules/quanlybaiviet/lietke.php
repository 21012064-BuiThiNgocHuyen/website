<?php 
  $limit = 5;
  $page = isset($_GET['trang']) ? intval($_GET['trang']) : 1;
  
  if ($page <= 0) {
      $page = 1;
  }
  
  
  $begin = ($page - 1) * $limit;
    $sql_lietke_bv= "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC LIMIT $begin, $limit";
    $query_lietke_bv= mysqli_query($mysqli,$sql_lietke_bv);

    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_baiviet");
    $row_count = mysqli_num_rows($sql_trang);
    $total_pages = ceil($row_count / $limit);

?>
<h3>Liệt kê bài viết</h3>
<button type="button"><a href="index.php?action=quanlybaiviet&query=them">Thêm</a></button>
<table style="width: 90%;border-collapse:collapse; margin:auto" border="1" >
  <tr>
    <th>Thứ tự</th>
    <th>Tên bài viêt</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>

  </tr>
  <?php 
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_bv)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="200px" height="180px"></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
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
      
      <a class="button" onclick="return deleteBV('<?php echo $row['id']?>')" href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id']?>">Xóa</a> |
      <a class="button" href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id']?>">Sửa</a>
    </td>
  </tr>
<?php 
}
?>
  
</table>

<div style="clear: both;"></div>
<style>
  td{
    text-align: center;
  }
</style>
<script>
        function deleteBV(id){
            return confirm ("Bạn có chắc chắn muốn xóa không ?")
        }
</script>
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
    <a href='index.php?action=quanlybaiviet&query=lietke&trang=<?php echo $i; ?>'><?php echo $i; ?></a>
  </li>
  <?php
  }
  ?>
</ul>