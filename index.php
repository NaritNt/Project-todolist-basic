<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  header('location: login.php');
}

function showData($id = 0)
{
  require "./db/conn.php";
  $sql = "SELECT * FROM list";

  if ($id == 0) {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $sql .= " WHERE list_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  return $rows;
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
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">TodoList</a>
      <div class="d-flex">
        <div class="m-2">
          <?php echo $_SESSION['username']; ?>
        </div>
        <div class="m-2"><a href="login.php?logout='1'">Logout</a></div>
      </div>
    </div>
  </nav>

  <!-- content -->
  <div class="container p-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div>
        <?php include "page/model_add.php"; ?>
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
          <table class="table mb-4 t-center table-borderless">
            <thead>
              <tr>
                <th scope="col">Todo Item</th>
                <th scope="col">Order Date</th>
                <th scope="col">Deadline</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $rows = showData(); ?>
              <?php foreach ($rows as $row) : ?>
                <?php if ($row['user_id'] == $_SESSION['user_id']) : ?>
                  <?php $description = $row["description"]; ?>
                  <?php $order_date = $row["order_date"] != "0000-00-00" ? $row["order_date"] : "ไม่ได้กำหนด"; ?>
                  <?php $deadline = $row["deadline"] != "0000-00-00" ? $row["deadline"] : "ไม่ได้กำหนด"; ?>
                  <?php $id = $row["list_id"]; ?>
                  <tr>
                    <td><?= $description ?></td>
                    <td><?= $order_date ?></td>
                    <td><?= $deadline ?></td>
                    <td class="d-flex ">
                      <button type='submit' name='edit' class='btn btn-outline-success ms-1 edit-click' data-bs-toggle="modal" data-bs-target="#edit_<?= $id ?>">Edit</button>
                      <form action="./db/check.php" method="post">
                        <input type="text" name="user" value="<?= $id ?>" hidden>
                        <button type='submit' name="delete" class='btn btn-outline-danger delete-click' data-id="">Delete</button>
                      </form>
                    </td>
                  </tr>
                  <?php include "./page/model_edit.php"; ?>
                <?php endif ?>
              <?php endforeach ?>
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