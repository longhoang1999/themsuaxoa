<!-- Xóa -->
<?php
$link = new mysqli('localhost','root','','qlkh') or die ('Ket noi that bai');
	if(isset($_GET['id'])){
		$makh = $_GET['id'];
		$query = "DELETE FROM khach_hang WHERE maKh='$makh'";
		mysqli_query($link, $query) or die ('Khong Xoa duoc');
		header('location:trangkhachhang2.php');
	}
?>
