<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, materialpro admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>admin</title>
    <!-- Favicon icon -->
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="../../style.css" rel="stylesheet">
</head>


<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ml-4" href="admin_dashboard.php">
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <h1 style="color: white;"><i>KOKERU</i></h1>

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_dashboard.php" aria-expanded="false"><i class="mdi mr-2 mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>


                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_karyawan.php" aria-expanded="false">
                                <i class="mdi mr-2 mdi-account-check"></i><span class="hide-menu">Karyawan</span></a>
                        </li>


                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_DRuangan.php" aria-expanded="false"><i class="mdi mr-2 mdi-table"></i><span class="hide-menu">Daftar Ruangan</span></a>
                        </li>
                        

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_laporan.php" aria-expanded="false"><i class="mdi mr-2 mdi-book-open-variant"></i><span class="hide-menu">Laporan</span></a>
                        </li>


                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../Login.php" aria-expanded="false">Log Out</span></a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>

        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0"><b>Karyawan</b></h3>
                    </div>
                </div>
            </div>
            <div style="padding-left: 2%; padding-right: 4%">
            <br>
            <!--CRUD KARYAWAN-->
            <?php
            require_once('../../db_login.php');
            $id = $_GET['id'];

            if (!isset($_POST["submit"])){
                $id = $_GET['id'];

                $query = "SELECT * FROM karyawan WHERE idkaryawan=".$id." ";
                //execute query
                $result = $db->query($query);
                if (!$result){
                    die("could not query the database:<br />".$db->error);
                }
                else{
                    while ($row = $result->fetch_object()){
                        $nama = $row->nama;
                        $email = $row->email;
                        $password = md5($row->password);
                    }
                }
            }

            else{
                $nama = test_input($_POST['nama']);
                $email = test_input($_POST['email']);
                $password = test_input($_POST['password']);

                $query = "UPDATE karyawan SET nama='".$nama."', email='".$email."', password='".md5($password)."' WHERE idkaryawan=".$id." ";
                $result = $db->query($query);
                if (!$result){
                    die("could not connect to database : <br />".$db->connect_error ."<br>Query: ".$query);
                }
                else{
                    $db->close();
                }
                
            }
            ?>
                
                <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" required>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" required>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>" required>
                        <br>
                        <br>
                    </div>

                    <button type="submit" class="btn btn-sm btn-main btn-primary" id="login-button" value="submit" name="submit">Save</button>
                    <br>
                    <br>
                    <a href="admin_karyawan.php" class="btn btn-sm btn-main btn-primary">Cancel</a>

                </form>
                <!--<br>
                <strong>Email</strong>
                <input type="email" name="email" class="form-control" required>
                <br>
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" required>
                <br>
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-sm btn-main btn-primary" id="login-button">Save</button>
                <br>
                <br>
                -->
            

            </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>