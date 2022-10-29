<?php
require "database.php";

class User extends Database{

    public function createUser($first_name,$last_name,$username,$password){
        $sql = "INSERT INTO `users`( `first_name`, `last_name`, `username`, `password`) VALUES ('$first_name','$last_name','$username','$password')";

        if($this->conn->query($sql)){
            header("location: ../views/index.php");
            exit;
        }else{
            die("Error creating user:" . $this->conn->error);
        }
    }

   /* function login($username,$password){
        $sql = "SELECT `user_id`,username,`password` FROM users WHERE username ='$username'";

        if($result = $this->conn->query($sql)){
            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc();
    
                if(password_verify($password,$user_details['password'])){
                    session_start();
    
                    $_SESSION['user_id'] = $user_details['user_id'];
                    $_SESSION['username'] = $user_details['username'];
    
                    header("location: ../views/dashboard.php");
                    exit;
                }else{
                    echo "<script> alert('Incorrect Password!')</script>";
                    echo "<script> location.href='../views/index.php'</script>";
                }
            }
            else{
                die ("Username not found");
            }
        }
       else{
            die("Error in retrieving data.".$this->conn->error);
        }
    }*/

    public function login($username, $password){
        $sql = "SELECT `user_id`, username, `password` FROM users WHERE username = '$username'";

        if($result = $this->conn->query($sql)){
            // Check if the username is existing
            if($result->num_rows == 1){
                // Check if the password is correct
                $user_details = $result->fetch_assoc();
                // $user_details is an associative array
                // print_r($user_details);
                if(password_verify($password, $user_details['password'])){
                    session_start();
                    $_SESSION['user_id'] = $user_details['user_id'];
                    $_SESSION['username'] = $user_details['username'];

                    header("location: ../views/dashboard.php");
                    exit;
                } else {
                    // Password is incorrect
                    die("Password is incorrect.");
                }
            } else {
                // Username is not existing
                die("Username not found.");
            }
        } else {
            die("Error logging in: " . $this->conn->error);
        }
    }

    public function getAllUsers($user_id){
        $sql = "SELECT `user_id`,first_name,last_name, username, photo FROM users WHERE user_id !=$user_id";

        if($result = $this->conn->query($sql)){
            return $result;
        }
        else{
            die('Error in retriving all users: '.$this->conn->error);
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("location: ../views");
        exit;
    }

    public function getUser($user_id){
        $sql = "SELECT `user_id`, first_name,last_name,username,photo FROM users WHERE `user_id` = $user_id";

        if($result = $this->conn->query($sql)){
            //expectiong one row only
            return $result->fetch_assoc();
        }else{
            die("Error retriving user: " . $this->conn->error);
        }
    }
    public function updateUser($user_id,$first_name,$last_name,$username){
        $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`username`='$username' WHERE `user_id`='$user_id'";
       /* echo $sql;
        exit;*/
        if($result = $this->conn->query($sql)){
            header("location:../views/dashboard.php");
        }else{
            die("Error updating user: " . $this->conn->error);
        }
    }

    public function deleteUser($user_id){
        $sql = "DELETE FROM `users` WHERE `user_id`= $user_id";

        if($this->conn->query($sql)){
            header("location:../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user:" . $this->conn->error);
        }
    }
    
    public function uploadPhoto($user_id,$photo_name,$tmp_name){
        $sql = "UPDATE users SET photo = '$photo_name' WHERE `user_id` = $user_id";

        if($this->conn->query($sql)){
            $destination = "../assets/images/$photo_name";
            if(move_uploaded_file($tmp_name,$destination)){
                header("location:../views/profile.php");
                exit;
            }else{
                die("Error uploading photo");
            }
        }else{
            die("Error uploading photo:" . $this->conn->error);
        }
    }
}

?>