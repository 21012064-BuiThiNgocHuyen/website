<?php 
    $sql_sua_bv = "SELECT * FROM tbl_baiviet WHERE id ='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_bv = mysqli_query($mysqli,$sql_sua_bv);
?>
<p>Sửa bài viết</p>
<table style="width: 100%;border-collapse:collapse" border="1" >
 <?php 
 while($row = mysqli_fetch_array($query_sua_bv)){
 ?> 
<form action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Tên bài viết</td>
    <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet" required></td>
  </tr>
  
  <tr>
    <td>Hình ảnh</td>
    <td>
      <input type="file"  name="hinhanh" required>
      <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="200px" height="180px">
      </td>
    </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><textarea rows="10" name="tomtat" style="resize: none;" required><?php echo $row['tomtat'] ?></textarea></td>
  </tr>
  
  <tr>
    <td>Nội dung</td>
    <td><textarea rows="10" name="noidung" style="resize: none;" required><?php echo $row['noidung'] ?></textarea></td>
  </tr>
  
  <tr>
    <td>Danh mục bài viết</td>
    <td>
      <select name="danhmuc">
      <?php 
      $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
      $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
      while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        if($row_danhmuc['id_baiviet']==$row['id_danhmuc']){
      
      ?>
      <option selected value="<?php echo $row_danhmuc['id_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
      <?php 
        }else{
      ?>
      <option value="<?php echo $row_danhmuc['id_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
      
      <?php 
        }
      }
      ?>
      </select>
    </td>
  </tr>

  <tr>
    <td>Tình trạng</td>
    <td>
      <?php 
      if($row['tinhtrang']==1){
      ?>
      <select name="tinhtrang">
          <option value="1" selected>Kích hoạt</option>
          <option value="0">Ấn</option>
          <?php
      }else{
        ?>
        <option value="1">Kích hoạt</option>
        <option value="0" selected>Ấn</option>
        <?php
      }
      ?>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="suabaiviet" valuebaiviet="Sửa bài viết"></td>
  </tr>
  </form>
  <?php
  }
  ?>
</table>

