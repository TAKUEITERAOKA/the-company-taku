<?php
session_start();
require "../classes/user.php";
$user= new User();
$user_id= $_GET['user_id'];
$user_details = $user->getUser($user_id);
$full_name = $user_details["first_name"]." ".$user_details["last_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"> <?= $_SESSION['username'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0"> Log Out</button>                     
                </form>
            </div>
        </div>
    </nav>
    <main class="container" style="padding-top:80px;">
    <div class="card w-25 mx-auto border-0">
        <div class="card-header bg-white border-0">
            <h2 class="text-center text-danger">DELETE USER</h2>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                <p class="fw-bold mb-0">Are you sure you want to delete "<?= $full_name ?>"?</p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="dashboard.php" class="btn btn-seecondary w-100">Cancel</a>
                </div>
                <div class="col">
                    <a href="../actions/delete-user.php?user_id=<?= $user_details['user_id']?>" class="btn btn-outline-danger w-100">Delete</a>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
</html>