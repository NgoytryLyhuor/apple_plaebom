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
                            <h4 class="mb-sm-0">View All Friends Data</h4>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sql_select = "SELECT * FROM tbl_me";
                                    $result = $con->query($sql_select);

                                    if ($result != '') {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if($row['status'] == 1){
                                                echo '
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" value="'.$row['id'].'">';
                                                            $sql_select1 = "SELECT * FROM tbl_admin WHERE id = ".$row['admin_id'];
                                                            $result1 = $con->query($sql_select1);
                                                            $row1 = mysqli_fetch_assoc($result1);
                                                            if($row['admin_id'] == $id){
                                                                echo '<span class="badge bg-success float-start mt-1"><span>' .$row1['username'] . '</span></span>';
                                                            }
                                                            else{
                                                                echo '<span class="badge bg-danger float-start mt-1"><span>' .$row1['username'] . '</span></span>';
                                                            }
                                                echo '
                                                            <img width="100px" src="./assets/images/news_banner/' . $row['profile'] . '" alt="">
                                                        </td>
                                                        <td align="left">
                                                            ' . $row['name'] . '
                                                        </td>
                                                        <td align="left">
                                                            ' . $row['gender'] . '
                                                        </td>
                                                        <td align="left">
                                                            ' . $row['email'] . '
                                                        </td>
                                                        <td align="left">
                                                            ' . $row['phone'] . '
                                                        </td>
                                                        <td>
                                                            ';

                                                    if($row['admin_id'] == $id){
                                                        echo'
                                                            <a class="btn btn-info waves-effect waves-linght" href="./tbl_people_update.php?id=' . $row['id'] . '">Update</a>
                                                            <button onclick="item_delete(`'.$row['id'].'`)" class="btn btn_delete btn-danger waves-effect waves-linght" data-bs-toggle="modal" data-bs-target="#myModal">Delete</button>
                                                        ';
                                                    }
                                                    else{
                                                        echo'
                                                            <button class="btn btn_delete btn-info waves-effect waves-linght" data-bs-toggle="modal" data-bs-target="#not_user_update">Update</button>
                                                            <button class="btn btn_delete btn-danger waves-effect waves-linght" data-bs-toggle="modal" data-bs-target="#not_user_delete">Delete</button>
                                                            
                                                        ';
                                                    }
                                                echo'
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure ?</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="delete_id" id="delete_id">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="btn_people_delete" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- The Modal -->
                            <div class="modal" id="not_user_delete">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">You can delete only your own item</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="delete_id" id="delete_id">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- The Modal -->
                            <div class="modal" id="not_user_update">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">You can update only your own item</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="delete_id" id="delete_id">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
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
    function item_delete(delete_id) {
        document.getElementById("delete_id").value = delete_id;
    }
</script>