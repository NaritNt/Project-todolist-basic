<?php
isset($_GET["edit_id"]) ? $edit_id = $_GET["edit_id"] : $edit_id = "";
function show_edit()
{
    global $edit_id;
    require "../db/conn.php";
    $sql = "SELECT * FROM list WHERE id=$edit_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // return  "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            echo '<form action="../db/check.php?edit_id=' . $row["id"] . '" method="post" class="text-center ">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="รายการ" aria-label="First name" name="description" value="' . $row["description"] . '">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-start">
                                <label>วันที่สั่ง</label>
                            </div>
                            <input type="date" class="form-control" placeholder="Order_date" aria-label="Last name" name="order_date" value ="' . $row["order_date"] . '">
                        </div>
                        <br>
                        <div class=" col-6">
                            <div class="text-start">
                                <label>วันที่กำหนดส่ง</label>
                            </div>
                            <input type="date" class="form-control" placeholder="Deadline" aria-label="Last name" name="deadline" value="' . $row["deadline"] . '">
                        </div>
                        <input type="text"name="id" value="' . $row["id"] . '" hidden>
                    </div>
                    <br>
                    <div class="c-container">
                    <button type="button" class="btn btn-outline-info back-page">BACK</button>
                    <button type="submit" class="btn btn-outline-info" name="action" value="edit_Data">SUMIT</button>
                    </div>
            </form>';
        }
    } else {
        echo "results";
    }
    $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link rel="stylesheet" href="../css/myCustom.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Navigator bar -->
    <?php
    require "../extension/nav.php"; ?>
    <br>

    <!-- add Data -->
    <div class="container">

        <div class="text-center">
            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                <u>My TodoList</u>
            </p>
        </div>
        <!-- form about add data-->
        <div class="row">
            <!-- object center of display -->
            <div class="d-flex justify-content-center align-items-center mx-auto my-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- FORM Data-->
                        <?php show_edit() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/Custom_add.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>