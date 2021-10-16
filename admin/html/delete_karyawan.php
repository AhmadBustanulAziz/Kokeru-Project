<?php 
    require_once('../../db_login.php');
    $id = $_GET['id'];

    $query = "DELETE FROM karyawan WHERE idkaryawan=".$id." " ;
    $result = $db->query($query);
    if (!$result){
        die ("Could not query the database: <br />". $db->error);
    }
    else{
        $db->close();
        header('Location: admin_karyawan.php');
    }
?>
<?php $db->close();?>