<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uplink = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "<script type='text/javascript'>alert(\"Sorry, file already exists.\");</script>";
    $uplink = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<script type='text/javascript'>alert(\"Sorry, your file is too large.\");</script>";
    $uplink = 0;
}

if ($uplink == 0) {
    echo "<script type='text/javascript'>alert(\"Sorry, your file was not uploaded.\");</script>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script type='text/javascript'>alert(\"The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded successfully\");</script>";
    } else {
        echo "<script type='text/javascript'>alert(\"Sorry, there was an error uploading your file.\");</script>";
    }
}
?>