<?php
    $file = $_FILES["file"];  // Getting uploaded file
    move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);  // Uploading in "uplaods" folder
    header("Location: " . $_SERVER["HTTP_REFERER"]);   // Redirecting back
?>