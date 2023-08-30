<?php
session_start();

if (!isset($_SESSION['loginpage'])) {
    header('location:login.php');
  }





require 'connect.php';

$query = 'SELECT * FROM users';
$result = mysqli_query($con, $query)

?>
<?php
require 'layouts/header.php'
?>

<div class="container">

    <h1 class="text-center my-3">user Table</h1>
    <a href="addPosts.php" class="btn btn-info mb-2">Add</a>
    <table class="table table-success">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($rows = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $rows['id'] ?></th>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['password'] ?></td>
                    <td><?php echo $rows['phone'] ?></td>
                    <td>
                            <form action="deleteuser.php" method="POST">
                                <input type="hidden" name="delete_id" value="<?php echo $rows['id'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
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