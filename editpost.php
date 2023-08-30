<?php
session_start();
require 'connect.php';

if(isset($_POST['edit'])){
   $edit_id = $_POST['edit_id'];

    $query = "SELECT * FROM posts WHERE id = '$edit_id'";

    $result = mysqli_query($con,$query);
    $_SESSION ['edit'] = '';
    $row = mysqli_fetch_array($result);

}

?>


<?php
require 'layouts/header.php'
?>

<div class="container mt-5">
    <h1 class="text-center">edit Post</h1>
    <form method="POST"action="updatepost.php">
        <input type="hidden" name="update_id"  value="<?php echo $row['id']?>">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="<?php echo $row['title']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" value="<?php echo $row['description']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Auther</label>
            <input type="text" name="auther"value="<?php echo $row['auther']?>" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require 'layouts/footer.php'
?>