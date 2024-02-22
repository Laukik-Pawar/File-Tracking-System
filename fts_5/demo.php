<?php

require "connection/connection.php";
require "init.php";

if (!isset($_SESSION['user'])) {
    header("location: home.php");
} else {
    $user_id = $_SESSION['user'];
    $typeid = $_SESSION['usertype'];
    $fileObject = isPrivileged($connection, $_REQUEST['file_id']);
    if (!$fileObject) {
        die("You do not have privilege to access this data.");
    }

    $getQuery = "SELECT * FROM `movements` where `file_id` = '". $_REQUEST['file_id'] . "' order by created_at";
    $result = mysqli_query($connection, $getQuery);
    $filesData = mysqli_fetch_all($result);

  
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

<style>
    .container{
        margin: 0px 0px 0px -25px;
    }
.Wel{
margin-left: 234px;
}

.theader {
    background: #dadada !important;
    padding-bottom: 1rem !important;
    padding-top: 1rem !important;
    padding-left: 23rem !important;
    font-size: 1.25rem !important;
    font-weight: 400 !important;
}

.track{
    font-size: 1.25rem;
    margin-left: 433px;
    font-weight: 500;
}
</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item" style="margin-left: 225px;">
<a class="nav-link size " href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
</li>
<li class="nav-item active">
<a class="nav-link size " href="home.php"><span><i class="fas fa-home"></i></span></a>
</li>
<li class="nav-item active">
                    <a class="nav-link size Wel" href="#">Welcome to Application Status Section <span><i class="far fa-file"></i></span></a>
                </li>

<li class="nav-item">
    <div class="dropdown pb-4 pt-2" style="margin-left: 275px;">
        <a href="#" class="d-flex align-items-center text-Black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
            <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="35" height="35"
                class="rounded-circle"> -->
            <span class="d-sm-inline mx-1 size">User Profile</span>
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
<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
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

<div class="col" style="background-color: #ffffff;">
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary" style="height: 530px; width: 800px;"> <!-- Adjust the height as needed -->
            <div class="panel-heading">
            <div>
                <table class="table table-responsive" style="width: 82.5vw">
                    <thead class="thead-dark" style="background: #2e6fa7; color: white;">
                    <tr>
                        <th colspan="8" class="theader">Status of Your Applications</th>
                    </tr>
                        <tr>
                            <th style="background-color: #e9ecef;" scope="col">#</th>
                            <th style="background-color: #e9ecef;" scope="col">From</th>
                            <th style="background-color: #e9ecef;" scope="col"></th>
                            <th style="background-color: #e9ecef;" scope="col">To</th>
                            <th style="background-color: #e9ecef;" scope="col">Note </th>
                            <th style="background-color: #e9ecef;" scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        <?php foreach ($filesData as $key => $file): ?>
                            <?php 
                                $fromUserQuery =  "SELECT  *  FROM `users` WHERE id = $file[1];";
                                $getFromUserResult = mysqli_query($connection,$fromUserQuery );
                                $fromUserObject = mysqli_fetch_object($getFromUserResult);
                                
                                $toUserQuery =  "SELECT  *  FROM `users` WHERE id = $file[3];";
                                $getToUserResult = mysqli_query($connection,$toUserQuery );
                                $toUserObject = mysqli_fetch_object($getToUserResult);
                             ?>
                            <tr>
                              <th scope="row"><?php echo $count ?></th>
                              <td><?php echo $fromUserObject->name ?></td>
                              <td style="text-align: center;">------></td>
                              <td><?php echo $toUserObject->name ?></td>
                              <td><?php echo $file[4] ?></td>
                              <td><?php echo date("d.m.Y h.i A", strtotime($file[5])) ?></td>
                            </tr>
                        <?php endforeach ?>

                        
                    </tbody>
                </table>
                <div class = "track">
                <?php
                                    //principal
                                    if ($_SESSION['usertype'] == 1): ?>
                              
                                        Path:<br>Staff
                                        <br>&nbsp;<i class="fa-solid fa-minus fa-rotate-90"></i>
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>You
                                        <br>&nbsp;<i class="fa-solid fa-minus fa-rotate-90"></i> revert back
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>Staff/student
                                        <br>
                                    
                                  <?php endif ?>  
                                    <?php
                                    //staff
                                    if ($_SESSION['usertype'] == 2): ?>
                                        Path:
                                        <br>Student
                                        <br>&nbsp;<i class="fa-solid fa-minus fa-rotate-90"></i>
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>You
                                        <br>&nbsp;<i class="fa-solid fa-minus fa-rotate-90"></i>
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>Principal
                                        <br>&nbsp;<i class="fa-solid fa-minus fa-rotate-90"></i> revert back
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>You
                                        <br>
                                   
                                        <?php endif ?>  
                                    <?php
                                    //admin
                                    if ($_SESSION['usertype'] == 3): ?>
                                  
                                    Path:
                                    <br>You
                                    <br>&nbsp;<i class="fa-solid fa-minus fa-rotate-90"></i>
                                    <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                    <br>anyone
                                    <br>
                                    <?php endif ?> 
                                    <?php
                                    //student
                                    if ($_SESSION['usertype'] == 4): ?>
                                        Path:
                                        <br>You
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>Staff
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>Principal
                                        <br>&nbsp;|   revert back
                                        <br>&nbsp;<i class="fa-solid fa-arrow-down"></i>
                                        <br>You
                                        <br>
                                        <?php endif ?>  
                        <?php if (! isDispatchable($connection, $fileObject->id)): ?>
                            
                                    Dispatched by you to <?php echo $toUserObject->name ?>
                            
                        <?php endif ?>

                        <?php if (isDispatchable($connection, $fileObject->id)): ?>
                                   * Not Dispatched yet 
                        <?php endif ?>
                        
                        <br>
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