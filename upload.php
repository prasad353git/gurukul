<?php

// Getting uploaded file
$file = $_FILES["file"];
$class = $_POST['class'];  
$sub = $_POST['sub'];  
$dir =  $class.$sub;

// Uploading in "uplaods" folder
$res=move_uploaded_file($file["tmp_name"], "$dir/" . $file["name"]);
if($res==0)
{
    echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>'; 

}

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>