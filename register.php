<?php
session_start();
include "db.php";

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['uname'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $email = validate($_POST['email']);
    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if(empty($email)) {
        header("Location: signup.php?error=Email is required.");
        exit();
    } else if(empty($password)) {
        header("Location: signup.php?error=Password is required.");
        exit();
    } else if(empty($uname)) {
        header("Location: signup.php?error=Username is required.");
        exit();
    }

    $query_user_duplicate = "SELECT * FROM quiz_users WHERE email = '".$email."'";
    $result_duplicate = mysqli_query($conn, $query_user_duplicate);
    if(mysqli_num_rows($result_duplicate) === 1) {
        header("Location: index.php?error=Email already exists!");
        exit();
    }

    $query = "INSERT INTO quiz_users (email , username, password) VALUES ('".$email."', '".$uname."', '".$password."')";

    mysqli_query($conn, $query);

    $query_user = "SELECT * FROM quiz_users WHERE email = '".$email."'";


    $result = mysqli_query($conn, $query_user);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['email'] === $email && $row['password'] === $password) {
            header("Location: index.php?success=SignUp Successfull! userid=".$row['id']);
            exit();
        }
    } else {
        header("Location: signup.php?error=SignUp Failed!");
        exit();
    }
} else {
    header("Location: signup.php?error=Provide all details to signup!");
    exit();
}