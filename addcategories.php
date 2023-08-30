<?php
session_start();
require 'connect.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO categories VALUES(NULL,'$title','$description')";

    $result = mysqli_query($con,$query);
    $_SESSION ['Add'] = '';
    header('location:categories.php');
}

?>


<?php
require 'layouts/header.php'
?>

<div class="container mt-5">
    <h1 class="text-center">Add Post</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
     

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require 'layouts/footer.php'
?>