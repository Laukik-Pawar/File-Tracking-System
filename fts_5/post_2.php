<?php
require "connection/connection.php";

if (!isset($_SESSION['user'])) {
    header("location: home.php");
    die();
}

$attached = null;
// if (isset($_FILES["fileupload"])) {
//     $attached = $_FILES["fileupload"]["tmp_name"];
//     $attached = mysqli_real_escape_string($connection, file_get_contents($attached)); // Read and escape the file content
// }



$file_id = ($_POST["file_id"]);
$file_name = ($_POST["file_name"]);
$description = ($_POST["description"]);

$predefinedPdfPath = "C:\Users\user\Downloads"; // Replace with the actual path
$pre = "\annotated_pdf (7).pdf";
$predefinedPdfPath = $predefinedPdfPath.$pre;
// Read the predefined PDF file
$attached = mysqli_real_escape_string($connection,file_get_contents($predefinedPdfPath));

// Determine attachment type based on file extension
$fileExtension = strtolower(pathinfo($_FILES["fileupload"]["name"], PATHINFO_EXTENSION));

// Define an array to map common file extensions to attachment types
$attachmentTypes = [
    'pdf' => 'application/pdf',
    'doc' => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'jpg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    // Add more file extensions and types as needed
];

// Set the default attachment type to 'application/octet-stream' if not found in the map
$attachmentType = isset($attachmentTypes[$fileExtension]) ? $attachmentTypes[$fileExtension] : 'application/pdf';

$rawQuery = "INSERT INTO `files` (`hardid`, `filename`, `attachment`, `attachment_type`, `description`, `user_id`) VALUES ('%s', '%s', '%s', '%s', '%s', '%d');";
$query = sprintf($rawQuery, $file_id, $file_name, $attached, $attachmentType, $description, $_SESSION['user']);
$result = mysqli_query($connection, $query, MYSQLI_USE_RESULT);

$fileid = mysqli_insert_id($connection);

// Movement
$rawMovementQuery = "INSERT INTO `movements` (`from_id`, `file_id`, `to_id`) VALUES ('%d', '%d', '%d');";
$movementQuery = sprintf($rawMovementQuery, $_SESSION['user'], $fileid, $_SESSION['user']);
$result = mysqli_query($connection, $movementQuery);

header("location: files.php");
?>
