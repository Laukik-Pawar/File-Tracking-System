<?php
require "connection/connection.php";
require "init.php";

if (!isset($_SESSION['user'])) {
header("location: home.php");
} else {
$user_id = $_SESSION['user'];
$getQuery = "SELECT * FROM `movements` WHERE `to_id` = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($connection, $getQuery);

$filesData = mysqli_fetch_all($result);
$filesData = array_unique(array_map(function ($i) { return $i[2]; }, $filesData));
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
.gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}

.theader {
    background: #dadada !important;
    padding-bottom: 1rem !important;
    padding-top: 1rem !important;
    padding-left: 23rem !important;
    font-size: 1.25rem !important;
    font-weight: 400 !important;
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
                    <a class="nav-link size Wel" href="#">Welcome to Student View Section <span><i class="far fa-file"></i></span></a>
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
                        <th colspan="8" class="theader">Details of Your Applications</th>
                    </tr>
                        <tr>
                            <th style="background-color: #e9ecef;" scope="col">#</th>
                            <th style="background-color: #e9ecef;" scope="col">ID</th>
                            <th style="background-color: #e9ecef;" scope="col">Name</th>
                            <th style="background-color: #e9ecef;" scope="col">Description</th>
                            <th style="background-color: #e9ecef;" scope="col">File </th>
                            <th style="background-color: #e9ecef;" scope="col">Added on</th>
                            <th style="background-color: #e9ecef;" scope="col">Added By</th>
                            <th style="background-color: #e9ecef;" scope="col">Options</th> <!-- Added "Soft File" column -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        <?php foreach ($filesData as $key => $file_id): ?>
                            <?php 
                                $fileQuery =  "SELECT * FROM `files` WHERE id = $file_id;";
                                $getFileResult = mysqli_query($connection, $fileQuery);
                                $fileObject = mysqli_fetch_object($getFileResult);

                                $createdUserQuery =  "SELECT * FROM `users` WHERE id = $fileObject->user_id;";
                                $getCreatedUserResult = mysqli_query($connection, $createdUserQuery);
                                $createdUserObject = mysqli_fetch_object($getCreatedUserResult);
                                $count++;

                                // Retrieve and display the soft file content
                                $softFileContent = base64_encode($fileObject->attachment);
                                ?>
                            <tr>
                                <th scope="row"><?php echo $count ?></th>
                                <td><?php echo $fileObject->hardid; ?></td>
                                <td><?php echo $fileObject->filename; ?></td>
                                <td title="<?php echo $fileObject->description; ?>"><?php echo substr($fileObject->description, 0, 50); ?>...</td>
                                <td style="width: 100px;">
                                    <!-- ... (controls) -->
                                    
                                    <!-- Display the View PDF link with the file ID as a query parameter -->
                                    <?php if (strpos($fileObject->attachment_type, 'image') !== false): ?>
                                    <a href="annotate.php?id=<?php echo $fileObject->id; ?>">View Image</a>
                                    <?php elseif ($fileObject->attachment_type === 'application/pdf'): ?>
                                        <a href="show_pdf.php?id=<?php echo $fileObject->id; ?>">View PDF</a>
                                    <?php elseif ($fileObject->attachment_type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'): ?>
                                        <!-- <a href="show_word.php?id=<?php echo $fileObject->id; ?>" target="_blank">View Word</a> -->
                                        <a href="data:application/octet-stream;base64,<?php echo $softFileContent; ?>" download="<?php echo $fileObject->filename; ?>">View word file</a>
                                        <?php endif ?>
                                
                            

                                <?php if ($fileObject->attachment): ?>
                                <!-- <a  href="/file/<?php echo $fileObject->attachment ?>" download="<?php echo $fileObject->attachment ?>"><button class="btn btn-sm btn-primary">Download</button></a>  -->
                                <!-- <a href="showing.php">View PDF</a> -->
                                <?php endif ?> / 
                                <?php if ($fileObject->attachment): ?>
                                    <!-- Display the soft file download link -->
                                    <a href="data:application/octet-stream;base64,<?php echo $softFileContent; ?>" download="<?php echo $fileObject->filename; ?>">Download </a>
                                <?php endif ?>
                                </td>
                                <td style="width: 175px;" ><?php echo date("d.m.Y h.i A", strtotime($fileObject->created_at)) ?></td>
                                <td><?php echo $createdUserObject->name ?></td>
                                <td>
                                <a  href="/fts_5/track.php?file_id=<?php echo $fileObject->id; ?>"><button class="btn btn-sm btn-primary">Track path</button></a> 
                                <?php if (isDispatchable($connection, $fileObject->id)): ?>
                                <a  href="/fts_5/dispatch.php?file_id=<?php echo $fileObject->id; ?>"><button class="btn btn-sm btn-primary">Dispatch</button></a> 
                                <?php endif ?>
                                <?php if ($createdUserObject->id == $_SESSION['user']): ?>
                                <a  href="deletefile.php?file_id=<?php echo $fileObject->id; ?>" ><button class="btn btn-sm btn-danger">Delete</button></a> 
                                <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
                            
    </div>
</div>
</div>
</div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>