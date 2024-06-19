<?php 
      $limit = 10;
      $page = isset($_GET['trang']) ? intval($_GET['trang']) : 1;
      if ($page <= 0) {
          $page = 1;
      }
    
      $begin = ($page - 1) * $limit;
    $sql_lietke_danhmucsp = "SELECT * FROM danhmucsp ORDER BY thutu DESC LIMIT $begin, $limit";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);

    $sql_trang = mysqli_query($mysqli, "SELECT * FROM danhmucsp");
    $row_count = mysqli_num_rows($sql_trang);
    $total_pages = ceil($row_count / $limit);
?>

<h3>Liệt kê danh mục sản phẩm</h3>
<button class="add" type="button"><a href="index.php?action=quanlydanhmucsanpham&query=them">Thêm danh mục</a></button>
<table style="width: 90%;border-collapse:collapse; margin:auto" border="1" >
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php 
  $i=0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
      <a onclick="return deleteDanhmucSP('<?php echo $row['id_danhmuc']?>')" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>"><i class="fa-regular fa-trash-can"></i></a> 
      <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>"><i class="fa-regular fa-pen-to-square"></i></a>
    </td>
  </tr>
<?php  
}
?>
  
</table>
<script>
        function deleteDanhmucSP(id){
            return confirm ("Bạn có chắc chắn muốn xóa không ?")
        }
</script> 
<ul class="list_pages">
  <?php
  for ($i = 1; $i <= $total_pages; $i++) {
  ?>
  <li <?php if ($i == $page) { echo 'style="background:blue;"'; } ?>>
    <a href='index.php?action=quanlydanhmucsanpham&query=lietke&trang=<?php echo $i; ?>'><?php echo $i; ?></a>
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
<style>
  td{
    text-align: center;
  }
</style>