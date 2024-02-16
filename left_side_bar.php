<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <?php
            $con = mysqli_connect('localhost', 'u243022743_root', '0965013885Lyhuor', 'apple_plaebom');
            $sql_select = "SELECT * FROM tbl_admin WHERE id = ".$id;
            $result = $con->query($sql_select);
            $row = mysqli_fetch_assoc($result);
            echo '   
                <div class="">
                    <img data-bs-toggle="modal" data-bs-target="#show_image" src="assets/images/users/' . $row['profile'] . '" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="mt-3">
                    <h4 class="font-size-16 mb-1 text-uppercase">' . $row['username'] . '</h4>
                    <span class="text-muted"><i class="fa-regular fa-circle-dot" style="color: #6fd088;"></i> Online</span>
                </div>
            ';
            ?>
            
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a class=" waves-effect" href="./index.php">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-user"></i>
                        <span>Our Friends</span>
                        <span style="float: right;"><i style="font-size: 12px;" class="fa-solid fa-chevron-down"></i></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="./tbl_people_view.php">View</a></li>
                        <li><a href="./tbl_people_insert.php">Insert</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        
    </div>
</div>