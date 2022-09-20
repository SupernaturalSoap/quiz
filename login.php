<?php
session_start();
include "db.php";

if(isset($_POST['uid']) && isset($_POST['password']) || isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $user = "";
    $field = "";

    if(isset($_POST['uid'])) {
        $user = validate($_POST['uid']);
        $field = 'id';
    } else if(isset($_POST['email'])) {
        $user = validate($_POST['email']);
        $field = 'email';
    } 

    $password = validate($_POST['password']);

    if(empty($user)) {
        header("Location: index.php?error=User id or email is required.");
        exit();
    } else if(empty($password)) {
        header("Location: index.php?error=Password is required.");
        exit();
    }

    $query = "SELECT * FROM quiz_users WHERE ".$field." = '".$user."' AND password = ".$password;

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row[$field] === $user && $row['password'] === $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            header("Location: quiz.php");
            exit();
        }
    } else {
        header("Location: index.php?error=Invalid User Credentials!");
        exit();
    }
} else {
    header("Location: index.php?error=Provide credentials to login.");
    exit();
}