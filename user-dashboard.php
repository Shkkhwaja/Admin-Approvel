<!DOCTYPE html>
<html>
<head>
	<title>User Login Success</title>
	<style>
		body {
			background-color: #f2f2f2;
		}

		.container {
			margin-top: 30px;
			text-align: center;
		}

		h1{
			font-size: 36px;
			margin-bottom: 20px;
			color: #333;
		}
        #users{
			margin-top: 10px;
		}
		p {
			font-size: 24px;
			color: #333;
			margin-bottom: 20px;
		}

		button {
			background-color: #008CBA;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-size: 20px;
			cursor: pointer;
		}

		button:hover {
			background-color: #00688B;
		}

        .center3{
			margin-top: -120px;
		}




	</style>
</head>
<body>
	<div class="container">
		<h1>Login Successful!</h1>
		<p>Welcome, user!</p>
		<a href="login.php"><button >Logout</button></a>
	</div>
</body>
</html>



<?php
include "connection.php";

// Pagination variables
$results_per_page = 10;
$page_number = 1;

// Check if page number is set in URL
if(isset($_GET['page'])){
    $page_number = $_GET['page'];
}

// Calculate offset for SQL query
$offset = ($page_number - 1) * $results_per_page;

// SQL query to select approved users with limit and offset for pagination
$query = "SELECT * FROM tbl_users WHERE status = 'approved' ORDER BY id ASC LIMIT $results_per_page OFFSET $offset";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>User Listing</title>
</head>
<body>
    <div class="center3">
        <h1>User Listing</h1>

        <table id="users">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Email Address</td>
                <td>Status</td>
            </tr>

            <?php while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email_address']; ?></td>
					<td><?php echo $row['status']; ?></td>

                </tr>
            <?php } ?>

        </table>

        <?php 
        // SQL query to count total number of approved users for pagination
        $query = "SELECT COUNT(*) as total FROM tbl_users WHERE status = 'approved'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $total_results = $row['total'];

        // Calculate total number of pages
        $total_pages = ceil($total_results / $results_per_page);

        // Display pagination links
        echo '<div class="pagination">';
        for($i = 1; $i <= $total_pages; $i++){
            if($i == $page_number){
                echo '<a class="active" href="user-listing.php?page='.$i.'">'.$i.'</a>';
            } else {
                echo '<a href="user-listing.php?page='.$i.'">'.$i.'</a>';
            }
        }
        echo '</div>';
        ?>

    </div>
</body>
</html>







