<html>
<head>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN KEBERSIHAN RUANGAN</h2>
        <h2>MONITORING KEBERSIHAN DAN KERAPIHAN RUANG</h2>
        <?php
            echo'<p>tanggal :' . date("d/m/Y") .'</p>';
            date_default_timezone_set("Etc/GMT-7");
            echo'<p>pukul : ' . date("h:i:sa") . '</p>';
        ?>
        <br>
        <br>
	</center>
 
	<?php 
	include '../../db_login.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>nama ruangan</th>
			<th>penanggungjawab</th>
			<th width="5%">status</th>
		</tr>
		<?php 
		$no = 1;
		$query = mysqli_query($db," SELECT ruang.nama AS nama, ruang.status, ruang.idruang, karyawan.idkaryawan, karyawan.nama AS knama FROM ruang JOIN karyawan ON ruang.idkaryawan = karyawan.idkaryawan ");
		while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['knama']; ?></td>
			<td><?php echo $data['status']; ?></td>
		</tr>
		<?php 
		}
		?>
        <!--
        <div id="adminkaryawan_table">
            <table class="table" id="adminkaryawan_tableheading" border="1" style="width: 100%">    
                <tr>
                    <th>No.</th>
                    <th>Ruangan</th>
                    <th>Penanggungjawab</th>
                    <th>Status</th>
                    <th></th>
                </tr>

                
                require_once('../../db_login.php');
                //Execute the query
                $query = " SELECT ruang.nama, ruang.status, ruang.idruang, karyawan.idkaryawan, karyawan.nama AS knama FROM ruang JOIN karyawan ON ruang.idkaryawan = karyawan.idkaryawan ORDER BY idkaryawan";
                $result = $db->query($query);
                if (!$result){
                    die("could not connect to database : <br />".$db->connect_error ."<br>Query: ".$query);
                }
                // fetch and display the result
                $i = 1;
                while ($row = $result->fetch_object()){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->nama.'</td>';
                    echo '<td>'.$row->knama.'</td>';
                    echo '<td>'.$row->status.'</td>';
                    echo '<td><a class="btn btn-danger btn-sm" href="reset_statusID.php?id='.$row->idruang.'">reset</a> </td>';
                    echo '</tr>';
                    $i++;
                }
                echo '<br />';

                echo '<td><a class="btn btn-danger btn-md" href="reset_status.php"">Reset All</a> </td>';
                $result->free();
                $db->close();
                
            -->
	        </table>
        </div>
 
	<script>
		window.print();
	</script>
 
</body>
</html>













