<?php

session_start();

include "conn.php";

// inserting image into database

if (isset($_POST["upload"])) {
    // echo "working "; for testing

    $name = $_POST["name"];
    $img = $_FILES["img"]["name"];

    $extention = array("jpg", "png", "jpeg");
    // $file_name = $_FILES["img"]["name"];

    $file_extention = pathinfo($img, PATHINFO_EXTENSION);

    if (!in_array($file_extention, $extention)) {
        $_SESSION["status"] = "Please enter valid extention";
        header("location:index.php");
    } else {


        $sql = "INSERT INTO students (std_name,std_img) VALUES ('{$name}','{$img}')";

        $run = mysqli_query($conn, $sql);
        if ($run) {
            move_uploaded_file($_FILES["img"]["tmp_name"], 'upload/' . $_FILES["img"]["name"]);

            $_SESSION["status"] = "image upload successfully";
            header("location:index.php");
        } else {
            $_SESSION["status"] = "image not upload successfully";

            header("location:index.php");
        }
    }
}