<?php

require "connection/connection.php";

if (!isset($_SESSION['user'])) {
    header("location: index.php");
} else {
    $user_id = $_SESSION['user'];
    $getQuery = "SELECT * FROM `users` where `id` = $user_id";
    $result = mysqli_query($connection, $getQuery);
    $userData = mysqli_fetch_array($result);
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
      .Wel{
        margin-left: 150px;
      }
      .size{
        font-size: 20px;
      }
      .container{
        margin: 50px 0px auto 15px;
      }
      
      .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
       }

        h5{
            padding-left: 15px;
       }
    </style>

</head>

<body>

<?php if (isset($_SESSION['user'])): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item" style="margin-left: 225px;">
                <a class="nav-link size " href="Sidebar.php"><i class="fa-solid fa-arrow-left"></i></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link size " href="Sidebar.php"><span><i class="fas fa-home"></i></span></a>
            </li>
                <li class="nav-item active">
                    <a class="nav-link size " href="#" style="margin-left: 50px;">Welcome to User </a>
                </li>
                <li class="nav-item">
                  <div class="dropdown pb-4 pt-2 ">
                      <a href="#" class="d-flex align-items-center text-Black text-decoration-none dropdown-toggle size Wel"
                          id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="d-sm-inline mx-1 ">Applications <i class="far fa-edit "></i></span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark text-small shadow Wel">
                          <li><a class="dropdown-item" href="files.php">View Application</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="App1.php">Write Application</a></li>
                      </ul>
                  </div>
              </li>
              <?php if ($userData[4]): ?>
              <li class="nav-item">
                  <div class="dropdown pb-4 pt-2 ">
                      <a href="#" class="d-flex align-items-center text-Black text-decoration-none dropdown-toggle size Wel"
                          id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="d-sm-inline mx-1 "> Users <i class="far fa-edit "></i></span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark text-small shadow Wel">
                          <li><a class="dropdown-item" href="show.php">Show Users</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="register.php">Add Users</a></li>
                      </ul>
                  </div>
              </li>
              <?php endif ?>  
                <li class="nav-item">
                    <div class="dropdown pb-4 pt-2" style="margin-left: 370px;">
                        <a href="#" class="d-flex align-items-center text-Black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="35" height="35"
                                class="rounded-circle"> -->
                            <span class="d-sm-inline mx-1 size">User Profile</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="demo.php">Profile</a></li>
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
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline color">Products</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline color">Product</span>1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline color">Product</span>2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline color">Product</span>3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline color">Product</span>4</a>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline color">Customers</span>
                            </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3" style="background-color: #dadada;">
              <div class="container">
                  <div class="col-md-6 col-md-offset-3">
                      <div class="panel panel-primary" style="height: 530px; width: 800px;"> <!-- Adjust the height as needed -->
                              <!-- Idhar Edit karte Jao mast -->
                              <div>
        <?php
        if (isset($_GET['id'])) {
            $fileId = $_GET['id'];

            // Replace with your database connection code
          
            $host = "localhost";
            $username = "root";
            $dbname = "fts_5";
            $port = 3307; // Use the appropriate port

            $conn = new mysqli($host, $username, '', $dbname, $port);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch PDF data based on the file ID
            $stmt = $conn->prepare("SELECT attachment FROM files WHERE id = ?");
            $stmt->bind_param("i", $fileId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $pdfData = $row['attachment'];

                // Output the PDF data
                echo '<div id="pdfContainer">';
                echo '<canvas id="pdfCanvas"></canvas>';
                echo '</div>';
            } else {
                echo '<p>File not found.</p>';
                exit();
            }
        } else {
            echo '<p>Invalid request.</p>';
            exit();
        }
        ?>
    </div>
    <div>
            <label for="colorPicker">Select Annotation Color:</label>
            <input type="color" id="colorPicker" onchange="changeColor(this.value)">
            <button onclick="toggleEraser()">Toggle Eraser</button>
        </div>
    <button onclick="prevPage()">Previous Page</button>
    <button onclick="nextPage()">Next Page</button>

    <button onclick="printPDF()">Download</button>
    <!-- <button onclick="saveAnnotations()">Download Annotated PDF</button> -->
     <a  href="post_1.php"><button class="btn btn-block btn-primary">Add File</button></a><br>

     <script>
        const {
            jsPDF
        } = window.jspdf;
        const pdfCanvas = document.getElementById('pdfCanvas');
        const context = pdfCanvas.getContext('2d');
        let pdfDoc = null;
        let pageNum = 1;

        const pdfData = atob('<?php echo base64_encode($pdfData); ?>');
        const binaryData = new Uint8Array(Array.from(pdfData).map(c => c.charCodeAt(0)));

        pdfjsLib.getDocument({
            data: binaryData
        }).promise.then(pdf => {
            pdfDoc = pdf;
            renderPage(pageNum);
        });

        const annotations = []; // Store annotations for each page

function prevPage() {
    if (pageNum > 1) {
        pageNum--;
        renderPage(pageNum);
    }
}

function nextPage() {
    if (pageNum < pdfDoc.numPages) {
        pageNum++;
        renderPage(pageNum);
    }
}

function renderAnnotations(pageNumber) {
    annotations[pageNumber - 1]?.forEach(annotation => {
        context.beginPath();
        context.moveTo(annotation.points[0].x, annotation.points[0].y);
        annotation.points.forEach(point => {
            context.lineTo(point.x, point.y);
        });
        context.strokeStyle = annotation.color;
        context.lineWidth = annotation.lineWidth;
        context.stroke();
    });
}


function renderPage(num) {
    pdfDoc.getPage(num).then(page => {
        const viewport = page.getViewport({
            scale: 1.5
        });
        pdfCanvas.width = viewport.width;
        pdfCanvas.height = viewport.height;

        const renderContext = {
            canvasContext: context,
            viewport: viewport
        };

        context.clearRect(0, 0, pdfCanvas.width, pdfCanvas.height); // Clear the canvas

        page.render(renderContext).promise.then(() => {
            renderAnnotations(num); // Render annotations after rendering the PDF content
        });
    });
}


let isDrawing = false;
let annotationX = 0;
let annotationY = 0;

pdfCanvas.addEventListener('mousedown', startDrawing);
pdfCanvas.addEventListener('mousemove', draw);
pdfCanvas.addEventListener('mouseup', stopDrawing);

function startDrawing(event) {
    isDrawing = true;
    annotationX = event.offsetX;
    annotationY = event.offsetY;
}

let currentColor = 'red';
let isErasing = false;

function changeColor(newColor) {
    currentColor = newColor;
}

function toggleEraser() {
    isErasing = !isErasing;
}

function draw(event) {
    if (!isDrawing) return;

    const x = event.offsetX;
    const y = event.offsetY;

    const annotation = {
        points: [{
            x: annotationX,
            y: annotationY
        }, {
            x,
            y
        }],
        color: isErasing ? 'white' : currentColor,
        lineWidth: isErasing ? 10 : 2
    };

    annotations[pageNum - 1] = annotations[pageNum - 1] || [];
    annotations[pageNum - 1].push(annotation);

    context.beginPath();
    context.moveTo(annotationX, annotationY);
    context.lineTo(x, y);
    context.strokeStyle = annotation.color;
    context.lineWidth = annotation.lineWidth;
    context.stroke();

    annotationX = x;
    annotationY = y;
}

function stopDrawing() {
    isDrawing = false;
}


function getAnnotations() {
    const allAnnotations = [];
    for (let i = 0; i < pdfDoc.numPages; i++) {
        const pageAnnotations = annotations[i] || [];
        allAnnotations.push(...pageAnnotations);
    }
    return allAnnotations;
}


function saveAnnotations() {
// Create a new jsPDF instance
const { jsPDF } = window.jspdf;
var doc = new jsPDF();

// Define dimensions and position for the image
var imgWidth = 210; // Adjust this as needed
var imgHeight = 297; // Adjust this as needed
var xPos = 10; // Adjust this as needed
var yPos = 10; // Adjust this as needed
const base64String = pdf1Data;

// A function to add an image and return a promise
function addImageToPDF(index) {
    return new Promise((resolve) => {
        doc.addImage(base64String[index], 'PNG', xPos, yPos, imgWidth, imgHeight);
        console.log(base64String[index]);
        resolve();
    });
}

// An array to store all the image addition promises
const imagePromises = [];

// Loop through the base64String and add images to the PDF
for (let i = 0; i < base64String.length; i++) {
    if (i > 0) {
        doc.addPage();
    }
    imagePromises.push(addImageToPDF(i));
}

// Wait for all promises to resolve before saving the PDF
Promise.all(imagePromises)
    .then(() => {
        // Save the PDF
        doc.save("output.pdf", { compress: true });
    })
    .catch((error) => {
        console.error('Error adding images to PDF:', error);
    });
}


let pdf1Data = []; // Initialize an array to store PDF page data URIs

function printPDF() {
    const doc = new jsPDF();
    
    for (let i = 1; i <= pdfDoc.numPages; i++) {
        pdfDoc.getPage(i).then(page => {
            const viewport = page.getViewport({ scale: 1.5 });
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            const renderContext = {
                canvasContext: context,
                viewport: viewport,
            };

            page.render(renderContext).promise.then(() => {
                renderAnnotationsOnCanvas(context, i); // Render annotations on the canvas
                const imageData = canvas.toDataURL();
                // pdfdat.push(imageData);
                if (i > 1) {
                    doc.addPage(); // Add a new page for each subsequent page
                }
                doc.addImage(imageData, 'PNG', 0, 0, doc.internal.pageSize.width, doc.internal.pageSize.height, '', 'FAST');
                if (i === pdfDoc.numPages) {
                    // Save and trigger the download
                    const fileName = 'annotated_pdf.pdf';
                    doc.save(fileName, { compress: true });
                    console.log(doc);
                }
            });
        });
        
    }
}



function renderAnnotationsOnCanvas(context, pageNumber) {
    annotations[pageNumber - 1]?.forEach(annotation => {
        context.beginPath();
        context.moveTo(annotation.points[0].x, annotation.points[0].y);
        annotation.points.forEach(point => {
            context.lineTo(point.x, point.y);
        });
        context.strokeStyle = annotation.color;
        context.lineWidth = annotation.lineWidth;
        context.stroke();
    });
}


    </script>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php endif ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>



</html>