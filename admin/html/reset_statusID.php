<?php 
    require_once('../../db_login.php');
    $id = $_GET['id'];

    $query = "UPDATE ruang SET status='BELUM', foto='' WHERE idruang=".$id." " ;
    $result = $db->query($query);
    if (!$result){
        die ("Could not query the database: <br />". $db->error);
    }
    else{
        $db->close();
        header('Location: admin_DRuangan.php');
    }
?>
<?php $db->close();?>