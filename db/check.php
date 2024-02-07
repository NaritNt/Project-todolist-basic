<?php

// INSERT Data to Databasee
isset($_POST["action"]) ? $action_post = $_POST["action"] : $action_post = "";
// insert Data to DataBase
if ($action_post == "addData") {
    require "conn.php";
    $descript = $_POST["description"];
    $orderDate = $_POST["order_date"];
    $deadline = $_POST["deadline"];

    $sql = "INSERT INTO list (description, order_date, deadline)
            VALUES ('$descript', '$orderDate', '$deadline')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='../index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
} // UPDATE Data from Database
else if ($action_post == "edit_Data") {
    require "conn.php";
    $descript = $_POST["description"];
    $orderDate = $_POST["order_date"];
    $deadline = $_POST["deadline"];
    $id = $_POST["id"];
    $sql = "UPDATE list SET 
    description ='$descript',
    order_date='$orderDate',
    deadline= '$deadline' 
    WHERE id =$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='../index.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

// DELETE Data from Database
isset($_GET["action_get"]) ? $bt_delete = $_GET["action_get"] : $bt_delete = "";
isset($_GET["delete_id"]) ? $delete_id = $_GET["delete_id"] : $delete_id = "";
if ($bt_delete == "delete") {
    require "conn.php";
    $sql = "DELETE FROM list WHERE id= $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>location.href='../index.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}
