<?php

include "conn.php";

// if(isset($_GET["id"])){
$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE std_id='{$id}'";
$run_sql = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($run_sql);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
unlink("upload/" . $result["std_img"]);

$sql1 = "DELETE FROM students WHERE std_id='{$id}'";

$run_sql1 = mysqli_query($conn, $sql1);
if ($run_sql1) {
    $_SESSION["status"] = "delete successfully";
    header("location:index.php");
}
// }