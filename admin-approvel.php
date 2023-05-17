<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Admin Approval</title>

    <div class="center3">
        <h1>User Register</h1>

        <table id="users">

        <tr>
            <td>Id</td>
            <td>Username</td>
            <td>Email address</td>
            <td>Action</td>
        </tr>

        <?php
        $query = "SELECT * FROM tbl_users WHERE status = 'pending' ORDER BY id ASC";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result)){
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email_address']; ?></td>

            <td>
                <form action="admin-approvel.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>

                    <input type="submit" name="approve" value="Approve"/>
                    <input class="edit-btn" type="submit" name="edit" value="Edit"/>
                    <input type="submit" name="delete" value="Delete"/>
                </form>
            </td> 
        </tr>
        
        <?php
        }
        ?>

<script>

let editBtn = document.getElementsByClassName('edit-btn');

        editBtn[0].addEventListener('click', () => {
        
            alert("Scroll Down to Edit User Info")
        });



</script>

        </table>
    </div>

    <?php
    if(isset($_POST['approve'])){
        $id = $_POST['id'];
        $select = "UPDATE tbl_users SET status = 'approved' WHERE id = '$id'";
        $result = mysqli_query($conn, $select);

        echo '<script type="text/javascript">
        alert("User Approved!");
        window.location.href = "admin-approvel.php";
        </script>';
    }

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $select = "DELETE FROM tbl_users WHERE id = '$id'";
        $result = mysqli_query($conn, $select);

        echo '<script type="text/javascript">
        alert("User Deleted!");
        window.location.href = "admin-approvel.php";
        </script>';
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $query = "SELECT * FROM tbl_users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    }
    ?>

    <div class="center3">
        <h1>Edit User</h1>

        <form action="admin-approvel.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>

            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $row['username'];?>" required/>

            <label>Email Address:</label>
            <input type="email" name="email" value="<?php echo $row['email_address'];?>" required/>

            <label>Password:</label>
            <input type="password" name="password" value="<?php echo $row['password'];?>" required/>

            <input type="submit" name="update" value="Update"/>
        </form>
    </div>
<?php

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update_query = "UPDATE tbl_users SET username='$username', email_address='$email', password='$password' WHERE id='$id'";
    $result = mysqli_query($conn, $update_query);

    // Show a message to the user
    if($result){
        echo '<script type="text/javascript">
        alert("User Updated!");
        window.location.href = "admin-approvel.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Failed to update user!");
        window.location.href = "admin-approvel.php";
        </script>';
    }
}


?>
    