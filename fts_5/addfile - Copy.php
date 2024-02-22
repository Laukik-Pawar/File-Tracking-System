<?php

require "connection/connection.php";

if (!isset($_SESSION['user'])) {
    header("location: home.php");
    die();
} else {

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>h5{
    padding-left: 200px;
}</style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="margin-left: 225px;">
                    <a class="nav-link size " href="Home.php"><i class="fa-solid fa-arrow-left"></i></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link size " href="Home.php"><span><i class="fas fa-home"></i></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link size Wel" href="#">Welcome to Student Application Section <span><i class="far fa-edit "></i></span></a>
                </li>
                <li class="nav-item">
                    <div class="dropdown pb-4 pt-2" style="margin-left: 200px;">
                        <a href="#" class="d-flex align-items-center text-Black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="35" height="35"
                                class="rounded-circle"> -->
                            <span class="d-sm-inline mx-1 ">User Profile</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container-fluid ">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-50">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="home.php" class="nav-link align-middle px-0"><span class="ms-1 d-none d-sm-inline color">Home <i class="fas fa-home"></i></span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline color dropdown-toggle color">Application</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="addfile.php" class="nav-link px-0"> <span class="d-none d-sm-inline color">Write Application <i class="far fa-edit "></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="files.php" class="nav-link px-0"> <span class="d-none d-sm-inline color">View Application <i class="far fa-file"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <li>
                            <a href="notifications.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline color">Notification <i class="fa-regular fa-bell"></i></span></a>
                        </li>
                        
                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3" style="background-color: #dadada;">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" style="height: 530px; width: 800px;"> <!-- Adjust the height as needed -->
                            <div class="panel-heading">
                                <h5>Please Fill the Application Form Below </h5>
                            </div>
                            <div style="padding: 10px;">
                                <form action="postaddfile.php" method="post" autocomplete="off" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="file_id">File ID</label>
                                        <input type="text" required="required" name="file_id" class="form-control opa" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="file_name">File Name</label>
                                        <input type="text" name="file_name" required="required" class="form-control opa" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">File Description (Optional)</label>
                                        <textarea name="description" class="form-control opa" rows="6"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="fileupload">Soft File (Optional)</label>
                                        <input type="file" name="fileupload" class="form-control" value="">

                                        <!-- <a href="form.html">Add Attachment</a> -->
                                    </div><br>

                                    <input type="submit" class="btn btn-block btn-success " style="margin-left:275px; width: 230px;" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>