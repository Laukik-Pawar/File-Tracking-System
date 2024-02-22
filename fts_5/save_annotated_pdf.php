<?php
require "connection/connection.php";
require "init.php";

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));

    // Get the image data and image ID from the request
    $imageData = $data->imageData;
    $imageId = $data->imageId;

    // Update the database with the annotated PDF data
    $query = "UPDATE `files` SET `annotated_pdf` = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "si", $imageData, $imageId);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
