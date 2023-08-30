<?php
session_start();
require 'connect.php';

$query = 'SELECT * FROM posts';
$result = mysqli_query($con, $query)

?>
<?php
require 'layouts/header.php'
?>

<div class="container">

    <h1 class="text-center my-3">employees</h1>
    <a href="addPosts.php" class="btn btn-info mb-2">Add</a>
    <?php
    if (isset($_SESSION['delete'])) {
    ?>
    <div class="alert alert-warning" role="alert">
    Data Delete succes fully
   </div>
   <?php
   unset($_SESSION['delete']);
    }
    ?>
    <?php
    if (isset($_SESSION['edit'])) {
    ?>
    <div class="alert alert-danger" role="alert">
    Data Delete succes fully
   </div>
   <?php
   unset($_SESSION['edit']);
    }
    ?>
     <?php
    if (isset($_SESSION['Add'])) {
    ?>
    <div class="alert alert-secondary" role="alert">
    Data Delete succes ful
   </div>
   <?php
   unset($_SESSION['Add']);
    }
    ?>

    <table class="table table-success">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">auther</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($rows = mysqli_fetch_array($result)) {
            ?>

                <tr>
                    <th scope="row"><?php echo $rows['id'] ?></th>
                    <td><?php echo $rows['title'] ?></td>
                    <td><?php echo $rows['description'] ?></td>
                    <td><?php echo $rows['auther'] ?></td>
                    <td  class="d-flex" style="gap: 10px">
                        <form action="deletepost.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $rows['id'] ?>">
                            <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
                        </form>

                        <form action="editpost.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $rows['id'] ?>">
                            <button type="submit" name="edit" class="btn btn-warning">edit</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>


        </tbody>
    </table>
</div>


<?php
require 'layouts/footer.php';
?>


