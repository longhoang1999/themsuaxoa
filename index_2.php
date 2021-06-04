<!-- CHỨC NĂNG THÊM VÀ HIỂN THỊ DỮ LIỆU -->
<?php
	$link = new mysqli('localhost','root','','qlkh') or die ('Ket noi that bai');
?>

<h2 align="center" > LAM VIEC VOI CO SO DU LIEU </h2>
<table width="100%" border="2">
	<tr>
		<th> Ma KH </th>
		<th> Ten KH </th>
		<th> Dia Chi </th>
		<th> Dien Thoai </th>
		<th> Email </th>
		<th> Xu Ly </th>
	</tr>

<?php			
	$query = "SELECT * FROM KHACH_HANG";
	$result = mysqli_query($link, $query);
	
	
	if(mysqli_num_rows($result)<>0) 
	{
		while($r = mysqli_fetch_assoc($result))
		{
			$makh = $r['maKh'];
			$tenkh = $r['tenKh'];
			$diachi = $r['diachi'];
			$dienthoai = $r['dienthoai'];
			$email = $r['email'];	
				echo "<tr>";
				echo "<td align='center'>$makh</td>";
				echo "<td align='center'>$tenkh</td>";
				echo "<td align='center'>$diachi</td>";
				echo "<td align='center'>$dienthoai</td>";
				echo "<td align='center'>$email</td>";	
				echo "<td align='center'> <a href='delete.php?id=$makh'>Xoa | <a href='update.php?id=$makh'>Sua </td>";
			  	echo "</tr>";
		}
	}
?>
</table>
<form method="post">
<table>
	<tr>
		<td> Ma KH: </td>
		<td><input type="text" name="makh" />
	</tr>
	<tr>
		<td> Ten KH: </td>
		<td><input type="text" name="tenkh" />
	</tr>
	<tr>
		<td> Dia chi: </td>
		<td><input type="text" name="diachi" />
	</tr>
	<tr>
		<td> Dien Thoai: </td>
		<td><input type="text" name="dienthoai" />
	</tr>
	<tr>
		<td> Email: </td>
		<td><input type="text" name="email" />
	</tr>
	<tr>
		<td colspan="2"> 
			<input type="submit" value="Them moi" name="insert" />
		</td>
	</tr>
	
</table>
</form>
<?php
	if(isset($_POST['insert'])){
		$maKh = $_POST['makh'];
		$tenKh = $_POST['tenkh'];
		$diachi = $_POST['diachi'];
		$dienthoai = $_POST['dienthoai'];
		$email = $_POST['email'];
		$query = "INSERT INTO khach_hang VALUE('$maKh','$tenKh','$diachi','$dienthoai','$email')";
		mysqli_query($link, $query) or die ("Khong them dc du lieu");
		header ('location:trangkhachhang2.php');
	}
?>