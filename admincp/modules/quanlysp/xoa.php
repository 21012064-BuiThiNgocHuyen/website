<?php
require_once '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    if ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }

    $sql_delete_sp = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id'";
    if ($mysqli->query($sql_delete_sp)) {
        echo "<script>alert('Xóa thành công!');</script>";
    } else {
        echo "<script>alert('Xóa thất bại!');</script>";
    }
    echo "<script>window.location.href = '../../index.php?action=quanlysp&query=them';</script>";
}
$mysqli->close();
?>
