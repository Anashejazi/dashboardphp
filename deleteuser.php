<?php
require 'connect.php';

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
   

    $query = "DELETE FROM users WHERE id = '$delete_id'";

    $result = mysqli_query($con,$query);

    header('location:index.php');
}
?>