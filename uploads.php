<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileToUpload"])) {
        $file = $_FILES["fileToUpload"];
        $uploadDir = "uploads/"; // Create a directory named "uploads" in the same directory as this script.
        $targetFile = $uploadDir . basename($file["name"]);

        // Check if the file is a text file
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($fileType == "php") {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                echo "File uploaded successfully!";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Only TXT files are allowed.";
        }
    }
}
?>
