<?php
session_start();

require 'connect.php';

if(isset($_POST['submit'])){
   $update_id = $_POST['update_id'];
   $title = $_POST['title'];
   $description = $_POST['description'];
   $auther = $_POST['auther'];
   

    $query = "UPDATE posts SET title='$title', description = '$description',auther ='$auther' WHERE id = '$update_id' ";

    $result = mysqli_query($con,$query);
    $_SESSION ['delete'] = '';
    header('location:posts.php');

}

?>