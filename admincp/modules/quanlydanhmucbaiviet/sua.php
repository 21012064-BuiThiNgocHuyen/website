<?php 
    $sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);
?>
<p>Sửa danh mục bài viết</p>
<table style="width: 50%;border-collapse:collapse" border="1" >
  <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>"> 
  <?php
    while($dong = mysqli_fetch_array($query_sua_danhmucbv)){
  ?>
  <tr>
    <td>Tên danh mục bài viết</td>
    <td><input type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" required name="tendanhmucbaiviet"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" value="<?php echo $dong['thutu'] ?>" required name="thutu"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết"></td>
  </tr>
  <?php
    }
  ?>
  </form>
 
  
</table>