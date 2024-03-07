<?php
session_start();

$errors = array();
include 'db/conn.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    $sql = "SELECT * FROM users WHERE username= ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $email);
    $stmt->execute();
    $data = $stmt->fetch();


    if ($data) {
        if ($data['username'] == $username) {
            array_push($errors, "Username is exists.");
            $_SESSION['error'] = "Username is exists.";
        }
        if ($data['email'] == $email) {
            array_push($errors, "email is exists.");
            $_SESSION['error'] = "emaiil is exists.";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "Password not match.");
            $_SESSION['error'] = "Password not match.";
        }
    }
    if (count($errors) == 0) {
        $password = md5($password_1);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        $row = $stmt->execute();
        $_SESSION['username'] = $username;
        header("Location: login.php");
    } else {
        array_push($errors, 'Username or Email alreay exists');
        $_SESSION['error'] = 'Username or Email alreay exists';
        header('location: register.php');
    }
}
