<h2>Liên hệ</h2>
<?php
  $sql_lienhe = "SELECT * FROM tbl_lienhe WHERE id  = 1 ";
  $query_lienhe = mysqli_query($mysqli,$sql_lienhe);
?>
  <?php
    while($dong = mysqli_fetch_array($query_lienhe)){
  ?>
  <p><?php echo $dong['thongtinlienhe'] ?></p>
  
  <?php
    }
  ?>
  
  

