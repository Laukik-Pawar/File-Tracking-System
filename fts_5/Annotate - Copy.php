<?php
require "connection/connection.php";
require "init.php";

if (!isset($_SESSION['user'])) {
    header("location: index.php");
    exit(); // Terminate script execution after redirection
}

if (isset($_GET['id'])) {
    $imageId = $_GET['id'];

    $query = "SELECT * FROM `files` WHERE id = $imageId;";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $imageData = mysqli_fetch_assoc($result);
        $imageType = $imageData['attachment_type'];
        $Name = $imageData['filename'];
        $text = $imageData['description'];
        $Remark = ""; // You can add a field for Remark in your files table if needed
    } else {
        echo '<p>Image not found.</p>';
        exit();
    }
} else {
    echo '<p>Invalid request.</p>';
    exit();
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <style>
        #pdfContainer {
            position: relative;
            margin-top: -60px;
            overflow: auto;
        }

        #pdfCanvas {
            border: 1px solid black;

        }

        /* #colorPicker {
         display: none;
        } */

        .Wel {
            margin-left: 200px;
        }

        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }

        .navbar {
            height: 50px;
        }

        .container {
            padding: 0;
            margin: 0;
            max-width: 600px;
        }

        .btn {
            margin: 8px;
        }

        .flex {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #navbar {
      position: sticky;
      top: 0;
      z-index: 100;
    }

    </style>
    
        
</head>

<body>

<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light ">

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
                <div class="dropdown pb-4 pt-2" style="margin-left: 370px;">
                        <a href="#" class="d-flex align-items-center text-Black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            <img src="images/Profile.jpg" alt="hugenerd" width="35" height="35"
                                class="rounded-circle">
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
        <div class="row ">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark position-fixed" style="height: 100vh">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="Home.php" class="nav-link align-middle px-0"><span class="ms-1 d-none d-sm-inline color">Home <i class="fas fa-home"></i></span></a>
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
            </div>
            <div class="col py-3" style="background-color: #dadada; height: 700px;">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary w-100" style="height: 564px; width: 800px;"> <!-- Adjust the height as needed -->
                            <div class="panel-heading">
                                <div style="border: 1px solid black; width: 800px; height: 600px;  background-color:black; margin-left:100px">
                                    <div class="flex">
                                        <input type="hidden" name="imageId" value="<?php echo $imageId; ?>">
                                        <label for="colorPicker" style ="font-size: 1.25rem; margin-right: 1rem;margin-left: 0.5rem;cursor: pointer;color: #6c757d;"><i class="fa-solid fa-pen"></i></label>
                                        <input type="color" id="colorPicker" name="color" value="#000000">
                                        <label for="brushSize" style ="font-size: 1.25rem; margin-right: 1rem;margin-left: 0.5rem;cursor: pointer;color: #6c757d;">Brush Size:</label>
                                        <input type="range" id="brushSize" name="brushSize" min="1" max="20" value="5">
                                    <button type="button" class="btn btn-success" id="downloadButton">Download   <i class="fa-solid fa-file-arrow-down"></i> </button>
                                    </div>
                                    <canvas id="imageCanvas" width="800px" height="600px"></canvas>

                                    
                                </div>

                            </div>




                        </div>
                        <!-- Idhar Edit karte Jao mast -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
     

////////////////////////////
const canvas = document.getElementById("imageCanvas");
        const context = canvas.getContext("2d");
        const colorPicker = document.getElementById("colorPicker");
        const brushSize = document.getElementById("brushSize");
        
        const img = new Image();
        img.src = "data:<?php echo $imageType; ?>;base64,<?php echo base64_encode($imageData['attachment']); ?>";
        img.onload = function () {
            context.drawImage(img, 0, 0, canvas.width, canvas.height);
        }

        let isDrawing = false;
        let lastX = 0;
        let lastY = 0;

        canvas.addEventListener("mousedown", (e) => {
            isDrawing = true;
            [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
        });

        canvas.addEventListener("mousemove", draw);

        canvas.addEventListener("mouseup", () => {
            isDrawing = false;
            [lastX, lastY] = [0, 0];
        });

        canvas.addEventListener("mouseout", () => (isDrawing = false));

        function draw(e) {
            if (!isDrawing) return;

            context.beginPath();
            context.moveTo(lastX, lastY);
            context.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
            context.strokeStyle = colorPicker.value;
            context.lineWidth = brushSize.value;
            context.lineCap = "round";
            context.stroke();

            [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
        }

//////////////////
      

        const downloadButton = document.getElementById("downloadButton");

        downloadButton.addEventListener("click", () => {
            const downloadLink = document.createElement("a");
            const annotatedImageData = canvas.toDataURL("image/jpeg");
            downloadLink.href = annotatedImageData;
            downloadLink.download = "annotated_image.jpg";
            downloadLink.click();
        });
    </script>


</html>