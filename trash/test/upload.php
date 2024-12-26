<?php

// Getting uploaded file
$file = $_FILES["file"];
$class = $_POST['class'];  
$sub = $_POST['sub'];  
$dir =  $class.$sub;

// Uploading in "uplaods" folder
move_uploaded_file($file["tmp_name"], "$dir/" . $file["name"]);

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>