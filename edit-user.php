<?php
include "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $select = "SELECT * FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($result);

    $username = $row['username'];
    $email_address = $row['email_address'];
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email_address = $_POST['email_address'];

   
}