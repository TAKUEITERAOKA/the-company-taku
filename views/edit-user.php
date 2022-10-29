<?php
session_start();
include "../classes/user.php";
$user = new User;
$user_details = $user->getUser($_GET['user_id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
   <nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container"><a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
    </a>
    <div class = "ms-auto">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="profile.php" class="nav-link">
                    <?=$_SESSION['username']?>
                </a>
            </li>
            <li class="nav-item">
                <a href="../actions/logout.php" class="nav-link text-danger">
                    Logout
                </a>
            </li>
        </ul>
        </div>
    </div>
   </nav>
   <main class="container" style="paddong-top:80px;">
   <div class="card w-50 mx-auto border-0">
    <div class="card-header bg-white border-0">
        <h2 class="text-center">Edit User</h2>
    </div>
    <div class="card-body">
        <form action="../actions/edit-user.php" method="post">
            <input type="hidden" name="user_id" value="<?=$user_details['user_id']?>">

            <label for="first-name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="<?=  $user_details['first_name']?>" class="form-control mb-2"required autofocus >

                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last-name" value="<?=  $user_details['last_name']?>" class="form-control mb-2" required>

                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" value="<?=  $user_details['username']?>" class="form-control mb-2 fw-bold" maxlength="15" required>
                    <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>

        </form>
    </div>
   </div> 
</body>
</html>