<?php
session_start();
include "db/conn.php";
$errors = array();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
    $sql = "SELECT * FROM users WHERE username=? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $rows = $stmt->fetch();

    if ($rows) {
        if (count($errors) == 0) {
            $_SESSION['user_id'] = $rows['user_id'];
            $_SESSION['success'] = 'You are now logged in';
            $_SESSION['username'] = $username;
            header('Location: index.php');
        } else {
            $_SESSION['error'] = "Username/Passowrd is wrong";
            header('Location: login.php');
        }
    }
}
