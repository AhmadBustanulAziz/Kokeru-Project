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

<?php
require_once('db_login.php');

if (isset($_POST["submit"])){
    $valid = TRUE;
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "*Mohon isi e-mail";
        $valid = FALSE;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "*Format e-mail salah";
        $valid = FALSE;
    }
    $password = test_input($_POST['password']);
    if ($password == ''){
        $error_password = "*Mohon isi password";
        $valid = FALSE;
    }
    if ($valid){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = (isset($_POST['email'])) ? $_POST['email'] : "";
            $password = (isset($_POST['password'])) ? $_POST['password'] : "";
            $id = $_GET['id'];  
            
            $query_a = "SELECT * FROM admin WHERE email='".$email."' AND password='".md5($password)."'" ;
            $result_a = $db->query($query_a);
            $query_p = "SELECT *, idkaryawan AS id FROM karyawan WHERE email='".$email."' AND password='".md5($password)."'";
            $result_p = $db->query($query_p);
            if (!$result_a || !$result_p){
                die ("Could not query the database: <br />". $db->error);
            }
            else{
                if ($result_a->num_rows > 0){
                    $row = $result_a->fetch_object();
                    $_SESSION['admin'] = $email;
                    header("location: admin/html/admin_dashboard.php");
                }
                else if ($result_p->num_rows > 0){
                    $row = $result_p->fetch_object();
                    $_SESSION['karyawan'] = $email;
                    header("location: karyawan/html/karyawan_dashboard.php?id=$row->id");
                }
                else{
                    $error = '<span class="error">E-Mail dan Password Tidak Sesuai</span>';
                }
            }
            $db->close();
        }
    }
}
?>

<body id="login-body">
    <div id="login">
        <h1 id="login-Title"><b>MONITORING KEBERSIHAN DAN KERAPIHAN RUANG <br>GEDUNG BERSAMA MAJU</b></h1>

        <br>
        <br>
        <br>
        <div class="card" id="login-card">
            <div class="card-body">
                <h4><b>Log in CS dan Admin</b></h4>
                <br>
                <form method="POST" autocomplete="on">

                    
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" required alue="<?php if(isset($email)) echo $email;?>">
                    <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>

                    <label><strong>Password</strong></label>
                    <input type="password" name="password" class="form-control" required value="">
                    <div class="error"><?php if(isset($error_password)) echo $error_password;?></div>
                    <br>

                    <button type="submit" class="btn btn-sm btn-main btn-primary" id="login-button" name="submit" value="submit">Log in</button>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>

    <footer id="login-footer">
        <h3><b>KoKeRu</b></h3>
        <p>Monitoring Kebersihan dan Kerapihan Ruang</p>
        <br>
        <a href="index.php" id="homelogin"><b>Home</b></a>
    </footer>
</body>