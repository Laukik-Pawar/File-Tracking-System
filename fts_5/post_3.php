<?php
require "connection/connection.php";

if (!isset($_SESSION['user'])) {
    header("location: home.php");
    die();
}

$file_id = ($_POST["file_id"]);
$file_name = ($_POST["file_name"]);
$description = ($_POST["description"]);

$predefinedPdfPath = "C:\Users\user\Downloads"; // Replace with the actual path
$pre = "\annotated_pdf (7).pdf";
$predefinedPdfPath = $predefinedPdfPath.$pre;

// Check if the file exists before attempting to replace it
if (file_exists($predefinedPdfPath)) {
    // Read the predefined PDF file
    $attached = mysqli_real_escape_string($connection, file_get_contents($predefinedPdfPath));

    // Determine attachment type based on file extension (if applicable)
    $fileExtension = strtolower(pathinfo($predefinedPdfPath, PATHINFO_EXTENSION));

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

    // Set the default attachment type to 'application/pdf' if not found in the map
    $attachmentType = isset($attachmentTypes[$fileExtension]) ? $attachmentTypes[$fileExtension] : 'application/pdf';

    // Update the existing file record in the database
    $rawQuery = "UPDATE `files` SET  `attachment` = '%s', `attachment_type` = '%s' WHERE `hardid` = '%s' AND `user_id` = '%d';";
    $query = sprintf($rawQuery, $attached, $attachmentType, $file_id, $_SESSION['user']);
    $result = mysqli_query($connection, $query);

    header("location: files.php");
} else {
    // Handle the case where the predefined file does not exist
    echo "The predefined file does not exist.";
}
?>
