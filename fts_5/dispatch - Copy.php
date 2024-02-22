<?php

require "connection/connection.php";
require "init.php";

if (!isset($_SESSION['user'])) {
    header("location: index.php");
} else {
    $user_id = $_SESSION['user'];
    $dObject = isDispatchable($connection, $_REQUEST['file_id']);
    
    if (!$dObject) {
        die("You do not have privilege or this file.");
    }
    
    $fileQuery =  "SELECT  *  FROM `files` WHERE id = {$_REQUEST['file_id']};";
    $getFileResult = mysqli_query($connection,$fileQuery );
    $fileObject = mysqli_fetch_object($getFileResult);

    $usersQuery =  "SELECT  *  FROM `users`; ";
    $getUserResult = mysqli_query($connection,$usersQuery );
    $usersObject = mysqli_fetch_all($getUserResult);

    $userstypeQuery =  "SELECT  *  FROM `usertype`;";
    $getUsertypeResult = mysqli_query($connection,$userstypeQuery );
    $userstypeObject = mysqli_fetch_all($getUsertypeResult);
    $typeid = "SELECT `usertype` from `usertype`WHERE id = {$_SESSION['user']};";
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
        h5{
        margin-top: 50px;
        margin-left: 225px;
        font-weight: 500;
        }
        #navbar{     
        position: sticky;
        top: 0;
        z-index: 100;
        }
        .navbar {
            height: 50px;
        }

        .wid{
            width: 585px !important; 
        }
        .Wel{
           margin-left:313px;
        }
    </style>

</head>

<body>

    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light ">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="margin-left: 225px;">
                    <a class="nav-link size " href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link size " href="home.php"><span><i class="fas fa-home"></i></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link size Wel" href="#">Welcome to File Dispatch <i class="fa-brands fa-telegram"></i></a>
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
                            <a href="index.php" class="nav-link align-middle px-0"><span class="ms-1 d-none d-sm-inline color">Home <i class="fas fa-home"></i></span></a>
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

            <div class="col" style="background-color: #dadada;">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" style="height: 530px; width: 800px;"> <!-- Adjust the height as needed -->
                        <div class="panel-heading">
                    <h5><i class="fa-brands fa-telegram"></i> Dispatch File: <?php echo $fileObject->filename ?></h5>
                    <br><br>
                </div>
                                <div style="margin-left: 100px;">
                                <form action="dispatchfile.php" method="post" autocomplete="off">
                      
                      <div class="form-group">
                          <label for="dispatch_name">Dispatch File to:</label><br>
                          
                         
                          <select  name="dispatch_name" id="dispatch_name" class="form-select opa wid">
                          <option selected>Open this select menu</option>
                              <?php foreach ( $usersObject as $user): ?>
                                  
                                  <?php
                                  //Principal
                                      if ($_SESSION['usertype'] == 1){
                                          $isCurrentUser = $_SESSION['user'] ;
                                          $selected = $user[1];
                                          }
                                      ?>
                                  <?php
                                  // Staff
                                  if ($_SESSION['usertype'] == 2){
                                  $isCurrentUserpawar = $_SESSION['user'] ;
                                  $selected = $isCurrentUserpawar && $user[5] =='1'? 'Principal' : '';
                                  }
                                  ?>
                                  <?php
                                //admin
                                  if ($_SESSION['usertype'] == 3){
                                      $isCurrentUserpawar = $_SESSION['user'] ;
                                      $selected = $user[1];
                                      }
                                  
                                  ?>
                                  <?php
                                 //student
                                  if ($_SESSION['usertype'] == 4){
                                  // $isCurrentUserlnp = ($user[1] == 'lnp');
                                  $isCurrentUser = $_SESSION['user'] ;
                                  $selected = $isCurrentUser && $user[5] =='2'? $user[1] : '';
                                  }
                                  
                                  ?>
                                  
                                  <option value="<?php echo $user[0]; ?>" ><?php echo $selected ; ?></option>
                                  <?php endforeach ?>
                             
                          </select>
                         
                          <br>
                          <div class="form-group" >
                          <label for="note">Note (Optional)</label>
                          <textarea  name="note" class="form-control opa wid" rows="6"></textarea>
                          </div>   
                          <br>
                          <input type="hidden" name="file_id" value="<?php echo $_REQUEST['file_id'] ?>">
                      </div>
                      <br>
                      <input type="submit" value="Dispatch"class="btn btn-block btn-success " style="width: 230px;     margin-left: 145px;">
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