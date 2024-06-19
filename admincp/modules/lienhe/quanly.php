<h3>Quản lý thông tin liên hệ</h3>
<?php
  $sql_lienhe = "SELECT * FROM tbl_lienhe WHERE id  = 1 ";
  $query_lienhe = mysqli_query($mysqli,$sql_lienhe);
?>
<table style="width: 80%;border-collapse:collapse; margin:auto" border="1" >
  <?php
    while($dong = mysqli_fetch_array($query_lienhe)){
  ?>
  <form action="modules/lienhe/xuly.php?id=<?php echo $dong['id'] ?>" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Thông tin liên hệ</td>
    <td><textarea rows="10" name="thongtinlienhe" style="resize: none"><?php echo $dong['thongtinlienhe'] ?></textarea></td>
  </tr>
  
  
  <tr>
    <td colspan="2"><input type="submit" name="themthongtinlienhe" value="Cập nhật "></td>
  </tr>
  <?php
    }
  ?>
  </form>
  
</table>
