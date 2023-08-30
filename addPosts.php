<?php
session_start();
require 'connect.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = htmlspecialchars($_POST['description']);
    $auther = $_POST['auther'];

    if(isset($_POST['submit'])) {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $tmp_name  = $image['tmp_name'];
        $exe = pathinfo($image_name);
        $extension = $exe ['extension'];
    
        $new_name = uniqid() . "." . $extension;
        $storage = 'image/' . $new_name;
        $allowed = array("jpg","jpeg","svg");
        if (in_array($extension,  $allowed)) {
            move_uploaded_file($tmp_name,$storage);
    
        }else {
            echo"الامتداد غير صحيح";
        }
        
    }


    $query = "INSERT INTO posts VALUES(NULL,'$title','$description','$auther','$new_name')";

    $result = mysqli_query($con,$query);
    $_SESSION ['Add'] = '';

    header('location:posts.php');
}

?>


<?php
require 'layouts/header.php'
?>

<div class="container mt-5">
    <h1 class="text-center">Add Post</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Auther</label>
            <input type="text" name="auther" class="form-control">
        </div>
        <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupFile01">Upload</label>
  <input type="file" name="image" class="form-control" id="inputGroupFile01">
</div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require 'layouts/footer.php'
?>