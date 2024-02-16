<?php
$con = mysqli_connect('localhost','root','','apple_plaebom');

session_start();
$id = $_SESSION['id'];
if (!$_SESSION['id']) {
    header("location:login.php");
}
include("header.php");
?>

<!-- ========== Left Sidebar Start ========== -->
<?php
include("left_side_bar.php");
?>
<!-- Left Sidebar End -->
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div style="overflow: hidden; width:100%; height:82vh" class="slide position-relative">
                <img class="w-100 h-100 position-absolute img-fluid" style="object-fit: cover;" src="./assets/images/background.gif" alt="">
                <div style="background-color: #0000007a;" class="container-fluid d-flex align-items-center justify-content-center position-absolute p-0 h-100">
                    <div class="box text-center">
                        <h1 class="text-white">Welcome to Admin Dashboard</h1>
                        <?php
                        $sql_select = "SELECT * FROM tbl_admin WHERE id = ".$id;
                        $result = $con->query($sql_select);
                        $row = mysqli_fetch_assoc($result);
                        echo '   
                                            <h1 class="text-warning text-uppercase">' . $row['username'] . '</h1>
                                        ';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<?php
include("right_side_bar.php");
?>
<!-- /Right-bar -->
</body>

</html>