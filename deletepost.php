<?php
session_start();
require 'connect.php';

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
   

    $query = "DELETE FROM posts WHERE id = '$delete_id'";

    $result = mysqli_query($con,$query);
    $_SESSION ['delete'] = '';

    header('location:posts.php');
}
?>