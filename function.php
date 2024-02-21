<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

$con = mysqli_connect('localhost','root','','apple_plaebom');

// User_register
    function User_register(){
        global $con;
        if(isset($_POST['btn_register'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $c_password = md5($_POST['password_confirmation']);

            $profile = rand(1,9999).'-'.$_FILES['profile']['name'];
            $parth_upload="./assets/images/users/".$profile;
            move_uploaded_file($_FILES['profile']['tmp_name'],$parth_upload);
            
            if( $password == $c_password ){
                $sql_insert="INSERT INTO tbl_admin VALUES(null,'$username','$password','$profile','$email')";
                $con->query($sql_insert);
                header('location:login.php');
            }
            else{
                echo '
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Password must be match...",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    </script>
                ';
            }
        }
    }User_register();
// User_register


// User_login
    function User_login(){
        global $con;
        session_start();
        if(isset($_POST['btn_login'])){

            $email = $_POST['email'];
            $password = md5($_POST['password']);
            
            $sql_select = "SELECT * FROM tbl_admin WHERE email = '$email' && password = '$password'";
            $result = $con->query($sql_select);
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            if(mysqli_num_rows($result) > 0){
                $_SESSION['id'] = $id;
                header("location:index.php");
            }
            else{
                header("location:login.php");
            }
        }
    }User_login();
// User_login


// User_Update_information
    function User_Update_information(){
        global $con;
        if (isset($_POST['btn_user_update'])) {

            if ($_FILES['new_profile']['size'] > 0) {
                $profile = rand(1, 999999999999) . '-' . $_FILES['new_profile']['name'];
                $parth_upload = "./assets/images/users/" . $profile;
                move_uploaded_file($_FILES['new_profile']['tmp_name'], $parth_upload);
            }
            else {
                $profile = $_POST['old_profile'];
            }

            $id = $_POST['id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql_update = "UPDATE tbl_admin SET username = '$username', password = '$password', profile = '$profile', email = '$email' WHERE id = $id";
            $result = $con->query($sql_update);
            if ($result == TRUE) {
                echo '
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Profile Edited Successful",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>
                ';
            }
        }
    }User_Update_information();
// User_Update_information


// Insert_friend_information
    function Insert_friend_information(){
        global $con;
        if (isset($_POST['btn_people_insert'])) {

            $name = $_POST['name'];
            $id = $_POST['id'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $profile = rand(1, 999999) . '-' . $_FILES['profile']['name'];
            $parth_upload = "./assets/images/news_banner/" . $profile;
            move_uploaded_file($_FILES['profile']['tmp_name'], $parth_upload);

            $sql_insert = "INSERT INTO tbl_me VALUES(null,'$id','$name','$gender','$email','$phone','$profile',1)";
            $result = $con->query($sql_insert);
            if ($result == TRUE) {
                echo '
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Insert Successful",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = "tbl_people_view.php";
                        });
                    </script>
                ';
            }
        }
    }Insert_friend_information();
// Insert_friend_information


// Update_friend_information
    function Update_friend_information(){
        global $con;
        if (isset($_POST['btn_people_update'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            if ($_FILES['new_profile']['size'] > 0) {
                $profile = rand(1, 999999) . '-' . $_FILES['new_profile']['name'];
                $parth_upload = "./assets/images/news_banner/" . $profile;
                move_uploaded_file($_FILES['new_profile']['tmp_name'], $parth_upload);
            } else {
                $profile = $_POST['old_profile'];
            }
            
            $sql_update = "UPDATE tbl_me SET name='$name',gender='$gender',phone='$phone',email='$email', profile='$profile' WHERE id = $id";
            $result = $con->query($sql_update);
            if ($result == TRUE) {
                echo '
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Update Successful",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = "tbl_people_view.php";
                        });
                    </script>
                ';
            }
        }
    }Update_friend_information();
// Update_friend_information


// Delete_friend_information
    function Delete_friend_information(){
        global $con;
        if(isset($_POST['btn_people_delete'])){
            $id = $_POST['delete_id'];
            $sql_update = "UPDATE tbl_me SET status=0 WHERE id = $id";
            $result = $con->query($sql_update);
            if($result == TRUE){
                echo"
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Delete Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                ";
            }
        }
    }Delete_friend_information();
// Delete_friend_information




?>