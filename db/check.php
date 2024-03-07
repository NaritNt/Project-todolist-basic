<?php

include "./conn.php";
if (isset($_POST['insert'])) {
    $description = $_POST['description'];
    $order_date = $_POST['order_date'];
    $deadline = $_POST['deadline'];
    $user_id = $_POST['user'];
    $sql = "INSERT INTO list (description, order_date, deadline, user_id) VAlUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $description);
    $stmt->bindParam(2, $order_date);
    $stmt->bindParam(3, $deadline);
    $stmt->bindParam(4, $user_id);
    $stmt->execute();
    header("location: ../index.php");
}

if (isset($_POST['update'])) {
    $description = $_POST['description'];
    $order_date = $_POST['order_date'];
    $deadline = $_POST['deadline'];
    $user_id = $_POST['user'];

    $sql = "UPDATE list SET description = ?, order_date=?, deadline=? WHERE list_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $description);
    $stmt->bindParam(2, $order_date);
    $stmt->bindParam(3, $deadline);
    $stmt->bindParam(4, $user_id);
    $stmt->execute();
    header("location: ../index.php");
}


if (isset($_POST['delete'])) {
    $user_id = $_POST['user'];

    $sql = "DELETE FROM list WHERE list_id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $user_id);
    $stmt->execute();
    header("location: ../index.php");
}
