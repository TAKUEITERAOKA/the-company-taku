<?php
session_start();

include "../classes/user.php";
$user = new User;
$user_details= $user->getUser($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<main class="card w-25 mx-auto my-5">
    <img src="../assets/images/<?= $user_details['photo']?>" alt="Profile Picture" class="card-img-top">
    <div class="card-body">
        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
            <div class="input-group input-group-sm">
                <input type="file" name="photo" id="photo" class="form-control" accept ="img/*" required>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-arroow-circle-up"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer border-0 bg-white">
        <p class="lead fw-bold mb-0">
            <?= $user_details['first_name']." " .$user_details['last_name']?>
        </p>
    </div>
</main>
</body>
</html>