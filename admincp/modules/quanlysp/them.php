
<h2>Thêm sản phẩm</h2>
<table style="width: 80%;border-collapse:collapse; margin:auto" border="1" >
  <form action="modules/quanlysp/xuly.php" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensanpham" required></td>
  </tr>
  <tr>
    <td>Mã sản phẩm</td>
    <td><input type="text" name="masp" required></td>
  </tr>
  <tr>
    <td>Giá sản phẩm</td>
    <td><input type="text" name="giasp" required></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" required></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" required></td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><textarea rows="10" name="tomtat" style="resize: none;" required></textarea></td>
  </tr>
  
  <tr>
    <td>Nội dung</td>
    <td><textarea rows="10" name="noidung" style="resize: none;" required></textarea></td>
  </tr>
  
  <tr>
    <td>Danh mục sản phẩm</td>
    <td>
      <select name="danhmuc">
      <?php 
      $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc DESC";
      $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
      while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
      ?>
      <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
      <?php 
      }
      ?>
      </select>
    </td>
  </tr>

  <tr>
    <td>Tình trạng</td>
    <td>
      <select name="tinhtrang">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input class="add" type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
  </tr>
  </form>
  
</table>
