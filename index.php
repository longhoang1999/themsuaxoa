<!-- CHỨC NĂNG TÌM KIẾM -->
<?php
	$link = new mysqli('localhost','root','','sach') or die ('Ket noi that bai');
?>
<h2 align="center"> <font color="#FF0000" size="7"> QUAN LY SACH </font></h2>
<table width="90%" border="2">
	<tr>
		<th> Ma Sach </th>
		<th> Ten Sach </th>
		<th> The Loai </th>
		<th> Tac Gia </th>
		<th> NXB </th>
		<th> Nam XB </th>
	</tr>
<?php			
	$query = "SELECT * FROM ttsach";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) <> 0) 
	{
		while($r = mysqli_fetch_assoc($result))
		  {
			  $masach = $r['masach'];
			  $tensach = $r['tensach'];
			  $theloai = $r['theloai'];
			  $tacgia = $r['tacgia'];
			  $nxb = $r['nxb'];
			  $namxb = $r['namxb'];	
			  echo "<tr>";
				echo "<td align='center'>$masach</td>";
				echo "<td align='center'>$tensach</td>";
				echo "<td align='center'>$theloai</td>";
				echo "<td align='center'>$tacgia</td>";
				echo "<td align='center'>$nxb</td>";
				echo "<td align='center'>$namxb</td>";	
			 echo "</tr>";
		  }
	}
?>
</table>
<br /> <br /> <br />
<div align="center">
    <form action="sach1.php" method="get">
        Search: <input type="text" name="search" />
        <input type="submit" name="ok" value="search" />
    </form>
</div>
<?php
        // Click submit de tim sach
        if (isset($_REQUEST['ok'])) 
        {
            // Dung ham addslashes de chong sql injection
            $search = addslashes($_GET['search']);
            // Neu $search rong thi bao loi, tuc la nguoi dung chua nhap lieu ma da nhan submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Ket noi sql
                $link = new mysql ('localhost','root','','sach') or die ('Ket noi that bai');
				
				// Dung cau lenh like trong sql va su dung toan tu % cua php de tim du lieu 
                $query = "select * from ttsach where tensach like '%$search%'";
 
                // Thuc hien cau truy van
                $sql = mysqli_query($link, $query);
 
                // Dem so dong truy van trong sql.
                $num = mysqli_num_rows($sql);
 
                // Neu co ket qua thi hien thi, nguoc lai thong bao khong tim thay ket qua
                if ($num > 0 && $search != "") 
                {
                    // Dung $num de dem do dong truy van
					echo "<br> <br> <br>";
                    echo "$num KET QUA TRA VE VOI TU KHOA <b>$search</b>";
					echo "<br> <br> <br>";
 
                    // Dung vong lap while & mysqli_fetch_assoc de lay toan bo du lieu trong table va truy van du lieu dang mang array.
                    echo '<table border="1" cellspacing="0" cellpadding="10" width="50%">';
					echo '<tr>';
							echo '<th> Ma Sach </th>';
							echo '<th> Ten Sach </th>';
							echo '<th> The Loai </th>';
							echo '<th> Tac Gia </th>';
							echo '<th> NXB </th>';
							echo '<th> Nam XB </th>';
					echo '</tr>';
						
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<td>{$row['masach']}</td>";
                            echo "<td>{$row['tensach']}</td>";
                            echo "<td>{$row['theloai']}</td>";
                            echo "<td>{$row['tacgia']}</td>";
                            echo "<td>{$row['nxb']}</td>";
							echo "<td>{$row['namxb']}</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
	/*	
	header ('location:sach.php');
	}*/
?>

