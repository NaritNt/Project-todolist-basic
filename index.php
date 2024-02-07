<?php

// <a></a> in line function
function showData()
{
  $count = 1;
  require "./db/conn.php";
  $sql = "SELECT * FROM list";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $botton = "./db/check.php";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "
      <tr>
        <th scope='row'>" . $count . "</th>
        <td>" . $row["description"] . "</td>
        <td>" . $row['order_date'] . "</td>
        <td>" . $row['deadline'] . "</td>
        <td>
        <a href='./page/edit.php?&edit_id=" . $row["id"] . "'>
          <button type='submit' class='btn btn-success ms-1 edit-click'> Edit Data </button>
        </a>
        <a href='./db/check.php?action_get=delete&delete_id=" . $row["id"] . "'>
          <button type='submit' class='btn btn-danger delete-click'> Delete Date </button>
        </a>
        </td>
      </tr>
      ";
      // echo  $row["description"] . " " . $row["order_date"] . " " . $row["deadline"] . "<br>";
      $count++;
    }
  }
  $conn->close();
}
// ⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️⚠️

// delete <a></a> and move to JavaScript File
function showData2()
{
  require "./db/conn.php";
  $sql = "SELECT * FROM list";
  $result = $conn->query($sql);
  return $result;
  $conn->close();
  }

function count_sql()
{
  require "db/conn.php";
  // SQL query to count rows
  $sql = "SELECT * FROM list";

  // Execute query
  $result = mysqli_query($conn, $sql);

  // Get row count
  $row_count = mysqli_num_rows($result);

  // Display row count
  return $row_count;
}
?>

<!-- 🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥-->
<!-- code for html -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List</title>

  <!-- My custom CSS -->
  <link rel="stylesheet" href="css/myCustom.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- Navigator bar -->

  <?php require "extension/nav.php";
  ?>


  <!-- content -->
  <div class="container p-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div>
        <?php
        include "page/model_add.php";
        ?>


      </div>
    </div>
  </div>



  </div>
  <div class="text-center">
    <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
      <u>My TodoList</u>
    </p>
    <button type="submit" class="btn btn-primary c-btn" name="bt-add" value="add" data-bs-toggle="modal" data-bs-target="#myModal_add">Add</button>
  </div>

  <!-- Show to List-->
  <div class="container py-5 d-flex justify-content-center align-items-center">
    <div class="col-8">
      <div class="card rounded-2 ">
        <div class="card-body p-4 ">
          <!-- Table view -->
          <table class="table mb-4 t-center">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Todo Item</th>
                <th scope="col">Order Date</th>
                <th scope="col">Deadline</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $rows = showData2();
              $count = 1;
              foreach ($rows as $row) {
                $description = $row["description"];
                $order_date = $row["order_date"] != "0000-00-00" ? $row["order_date"] : "ไม่ได้กำหนด";
                $deadline = $row["deadline"] != "0000-00-00" ? $row["deadline"] : "ไม่ได้กำหนด";
                $id = $row["id"];
                echo "<tr>
                      <th scope='row'>" . $count . "</th>
                      <td>" . $description . "</td>
                      <td>" . $order_date . "</td>
                      <td>" . $deadline . "</td>
                      <td>
                        <button type='submit' name='edit-btn' value='edit-btn' class='btn btn-outline-success ms-1 edit-click' data-id=" . $id . ">Edit</button>
                        <button type='submit' class='btn btn-outline-danger delete-click' data-id=" . $id . ">Delete</button>
                      </td>
                    </tr>";
                $count++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="js/btn_edit_delete.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Custom by my JavaScript-->
</body>

</html>