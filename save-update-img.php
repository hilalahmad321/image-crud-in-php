<?php

session_start();

include "conn.php";

if (isset($_POST["update_img"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $old_img = $_POST["old_img"];
    $new_img = $_FILES["new_img"]["name"];
    $tmp_name = $_FILES["new_img"]["tmp_name"];
    $validation = array("jpg", "png", "jpeg");

    if ($new_img != '') {
        $file_name = $new_img;
    } else {
        $file_name = $old_img;
    }
    $file_extention = pathinfo($file_name, PATHINFO_EXTENSION);

    if (!in_array($file_extention, $validation)) {
        $_SESSION["status"] = "Please enter valid extention";
        header("location:update-img.php?id=" . $id);
    } else {
        $sql = "UPDATE students SET std_name='{$name}' , std_img='{$file_name}' WHERE std_id='$id'";
        $run_sql = mysqli_query($conn, $sql);
        if ($run_sql) {
            if ($new_img != '') {
                move_uploaded_file($tmp_name, 'upload/' . $new_img);
                unlink("upload/" . $old_img);
            }
            $_SESSION["status"] = "data update successfully";
            header("location:index.php");
        } else {
            $_SESSION["status"] = "data not update successfully";
            header("location:index.php");
        }
    }
}