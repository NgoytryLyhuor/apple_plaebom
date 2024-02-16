<?php
include("function.php");

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
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profile</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="card">
                    <?php
                        $sql_select = "SELECT * FROM tbl_admin WHERE id = ".$id;
                        $result = $con->query($sql_select);
                        $row = mysqli_fetch_assoc($result);
                        echo '
                            <div class="row p-0">
                                <div class="col-lg-2">
                                    <div class="card-body">
                                        <img class="rounded me-2 showImage1" alt="200x200" width="100%" src="./assets/images/users/' . $row['profile'] . '" data-holder-rendered="true">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="' . $row['id'] . '" name="id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" name="username" class="form-control" value="' . $row['username'] . '" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email"  class="form-control" value="' . $row['email'] . '" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" disabled value="' . $row['password'] . '" required>
                                                        <input type="hidden" name="password" class="form-control" value="' . $row['password'] . '" required>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Profile</label>
                                                        <input type="file" name="new_profile" class="form-control image1">
                                                        <input type="hidden" name="old_profile" value="' . $row['profile'] . '" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"></label>
                                                        <button class="btn btn-info w-100" name="btn_user_update" style="margin-top: 8px;" type="submit">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

<script>

    $(document).ready(function(){
        $(".image1").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $(".showImage1").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>