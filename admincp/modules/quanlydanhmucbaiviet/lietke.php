<?php 
  $limit = 10;
  $page = isset($_GET['trang']) ? intval($_GET['trang']) : 1;
  if ($page <= 0) {
      $page = 1;
  }

  $begin = ($page - 1) * $limit;

  $sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC LIMIT $begin, $limit";
    $query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);
    
  $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_danhmucbaiviet");
    $row_count = mysqli_num_rows($sql_trang);
    $total_pages = ceil($row_count / $limit);
    
?>
<p>Liệt kê danh mục bài viết</p>
<button type="button"><a href="index.php?action=quanlydanhmucbaiviet&query=them">Thêm</a></button>
<table style="width: 90%;border-collapse:collapse" border="1" >
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php 
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td>
      <a class="button" onclick="return deleteDanhmucBV('<?php echo $row['id_baiviet']?>')" href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>">Xóa</a> | 
      <a class="button" href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet']?>">Sửa</a>
    </td>
  </tr>
<?php 
}
?>
  
</table>
<style>
  td{
    text-align: center;
}
</style>
<script>
        function deleteDanhmucBV(id){
            return confirm ("Bạn có chắc chắn muốn xóa không ?")
        }
</script>
<ul class="list_pages">
  <?php
  for ($i = 1; $i <= $total_pages; $i++) {
  ?>
  <li <?php if ($i == $page) { echo 'style="background:blue;"'; } ?>>
    <a href='index.php?action=quanlydanhmucbaiviet&query=lietke&trang=<?php echo $i; ?>'><?php echo $i; ?></a>
  </li>
  <?php
  }
  ?>
</ul>
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
</style>