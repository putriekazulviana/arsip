<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
$server = "127.0.0.1:3306";
$user = "root";
$password = "";
$database = "arsip";
$kon = mysqli_connect($server, $user, $password, $database);

$tablearsip = "SELECT * FROM arsip";
$tablearsipquery = $kon->query($tablearsip);
$tablearsiprow = $tablearsipquery->num_rows;

?>
<?php
include("layout/header.php");
include("layout/sidebar.php");
include("layout/topbar.php");
?>
<style>
    .card {
        transition: transform 0.7s;
    }

    .card:hover {
        transform: translateY(10px);
    }
</style>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 style="text-align: center;" class="h4 mb-4 text-gray-800">WELCOME <?php echo $_SESSION['username']; ?>!
    </h1>
<!-- 
    <br> -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="arsip.php">
                                    <p style="color:#337AB7; font-size:15px;">Data Arsip</p>
                                </a>
                                <p style="text-align: left;font-size: 22px;color: blue;margin: 0;"><?php echo $tablearsiprow; ?></p>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            <i class="bi bi-journal-bookmark-fill fa-3x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="about.php">
                                    <p style="color:#337AB7; font-size:15px;">About</p>
                                </a>
                                <p style="text-align: left;font-size: 22px;color: white;margin: 0;">1</p>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            <i class="bi bi-info-circle-fill fa-3x text-gray-500"></i>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include("layout/footer.php");
?>

</html>