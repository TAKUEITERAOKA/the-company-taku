<?php
session_start();

include "../classes/user.php";
$user = new User;
$all_users = $user->getAllUsers($_SESSION['user_id']);

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
            <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <?=$_SESSION['username'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger">Log Out</a>
                </li>
            </ul>
               <!--<span class="navbar-text"> </span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0"> Log Out</button>                     
                </form>-->
            </div>
        </div>
    </nav>
    <main class="container" style="padding-top:80px;">
    <h2 class="text-muted display-6">USER LIST</h2>
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th class="fw-bold">First Name</th>
                <th class="fw-bold">Last Name</th>
                <th>Username</th>
                <th></th>
            </tr>
        </thead>

        <tbody class="lead">
            <?php
            while($user = $all_users->fetch_assoc()){
            ?>
            <tr>
                <td> <?= $user['user_id']?></td>
                <td> <?= $user['first_name']?></td>
                <td> <?= $user['last_name']?></td>
                <td> <?= $user['username']?></td>
                <td>
                    <a href="edit-user.php?user_id=<?=$user['user_id']?>" class="btn btn-outline-warning">
                      <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href="delete-user.php?user_id=<?= $user['user_id'] ?>" class="btn btn-outline-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </main>
</body>
</html>