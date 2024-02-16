<?php
include("function.php");

$id = $_SESSION['id'];
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
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Insert New Friend</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">

                                        <?php
                                            echo'
                                                <input class="form-control" type="hidden" value="'.$id.'" id="title" name="id" required>
                                            ';                                    
                                        ?>

                                        <div class="row mb-3">
                                            <label for="title" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="title" name="name" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="title" class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                    <select class="form-select" name="gender" aria-label="Default select example">
                                                        <option selected="">Select gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="title" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" id="title" name="email" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="title" class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number" id="title" name="phone" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control image1" type="file" id="image" name="profile"required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="image" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <img class="rounded me-2 showImage1" alt="200x200" height="200" src="./assets/images/no_image.png" data-holder-rendered="true">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="image" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_people_insert" class="btn btn-info waves-effect waves-linght">Insert News Data</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End Page-content -->
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