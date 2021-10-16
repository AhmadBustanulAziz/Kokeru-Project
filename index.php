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
        <div class="row" id="home-heading">
            <div class="col-lg-9">
                <h1 id="home-Title"><b>MONITORING KEBERSIHAN DAN KERAPIHAN RUANG GEDUNG BERSAMA MAJU</b></h1>
            </div>

            <div class="col-lg-2">
                <div class="WT">
                    <?php
                        echo'<h5><b>Tanggal : ' . date("d/m/Y") .'</b></h5>';
                        date_default_timezone_set("Etc/GMT-7");
                        echo'<h5><b>Waktu : ' . date("h:i:sa") . '</b></h5>';
                    ?>
                </div>

            </div>
        </div>
        

        <div class="row" id="home-Rooms">
        <?php
        require_once('db_login.php');
        ?>
            <?php

            $query = " SELECT ruang.idruang AS id, ruang.nama AS nama, ruang.status AS status, ruang.foto AS foto, karyawan.nama AS knama, karyawan.idkaryawan AS idkaryawan FROM ruang JOIN karyawan ON ruang.idkaryawan = karyawan.idkaryawan ";
            $result = $db->query($query);
        
            if (!$result){
                die("could not connect to database : <br />".$db->connect_error ."<br>Query: ".$query);
            }

            while ($row = $result->fetch_object()){
                if($row->status == 'SUDAH'){
                    $warna = 'sudah';
                }
                else{
                    $warna = 'belum';
                }
                echo'
                <div class="col-sm-2">
                    <div class="card" id="home-card">
                        <div id="'.$warna.'">
                            <div class="card-body">
                            <h2><b>R. '.$row->nama.'</b></h2>
                            <br>
                            <h4><strong>'.$row->status.'</strong></h4>
                            <p>'.$row->knama.'</p>

                            <a class="btn-primary btn-sm" href="detailruang.php?id='.$row->id.'" id="button"> Detail </a>

                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>

        </div>
    </div>
    <footer id="home-footer">
        <h3><b>KoKeRu</b></h3>
        <p>Monitoring Kebersihan dan Kerapihan Ruang</p>
        <br>
        <a href="Login.php" id="homelogin"><b>Log in</b></a>
    </footer>

</body>