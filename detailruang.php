<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.5.2-dist\bootstrap-4.5.2-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div id="Home">
        <h1 id="home-Title"><b>MONITORING KEBERSIHAN DAN KERAPIHAN RUANG GEDUNG BERSAMA MAJU</b></h1>
        <br>
        <br>

            <?php
            require_once('db_login.php');
            ?>
            <?php
                $id = $_GET['id'];

                $query = " SELECT * FROM ruang WHERE idruang=".$id." ";
                $result = $db->query($query);
            
                if (!$result){
                    die("could not connect to database : <br />".$db->connect_error ."<br>Query: ".$query);
                }

                while ($row = $result->fetch_object()){
                    echo'<h1 class="WT"> RUANG - '.$row->nama.'</h1> <br>';
                    echo'<div class="row" id="content">';
                        echo'<div class="col-sm-3" id="text1">';
                            echo'<img src="data:image/jpeg;base64,'.base64_encode($row->foto).'" style="max-width: 500px;">';
                        echo'</div>';
                    echo'</div>';

                }
            ?>
    </div>
    <footer id="home-footer" style="margin-top: 55vh">
        <h3><b>KoKeRu</b></h3>
        <p>Monitoring Kebersihan dan Kerapihan Ruang</p>
        <br>
        <a href="index.php" id="homelogin"><b>Home</b></a>
    </footer>

</body>
