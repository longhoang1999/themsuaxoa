<!-- Sửa -->
<?php
	$link = new mysqli('localhost','root','','qlkh') or die ('Ket noi that bai');
?>
<form method="post"> 
	Ten Kh: <input type="text" name="tenkh" value="<?php $_GET['id']?>" /><br /> <br />
	Dia chi: <input type="text" name="diachi" value="<?php $_GET['id']?>" /><br /> <br />
	Dien thoai: <input type="text" name="dienthoai" value="<?php $_GET['id']?>" /><br /> <br />
	Email: <input type="text" name="email" value="<?php $_GET['id']?>" /><br /> <br />
	<input type="submit" name="update" value="Chap nhan" />
</form>

<?php	
	if(isset($_POST['update'])){
		$makh = $_GET['id'];
		$tenkh = $_POST['tenkh'];
		$diachi = $_POST['diachi'];
		$dienthoai = $_POST['dienthoai'];
		$email = $_POST['email'];
		$query = "UPDATE khach_hang SET tenKh='$tenkh', diachi='$diachi', dienthoai='$dienthoai', email='$email' WHERE maKh='$makh'";
		mysqli_query($link, $query) or die ('Khong Sua duoc');
	header('location:trangkhachhang2.php');
}
?>
