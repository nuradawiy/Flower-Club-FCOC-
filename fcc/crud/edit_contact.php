<?php
include "db_conn.php";
$contact_id = $_GET["contact_id"];

if (isset($_POST["submit"])) {
  $contact_name = $_POST['contact_name'];
  $contact_studid = $_POST['contact_studid'];
  $contact_phone = $_POST['contact_phone'];
  $contact_email = $_POST['contact_email'];
  $contact_desc = $_POST['contact_desc'];

  $sql = "UPDATE `contact` SET `contact_id`='$contact_id',`contact_name`='$contact_name',`contact_studid`='$contact_studid',`contact_phone`='$contact_phone',`contact_email`='$contact_email',`contact_desc`='$contact_desc'   WHERE contact_id = $contact_id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: contact.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP members Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete Contact Us Information
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Contact Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `contact` WHERE contact_id = $contact_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Contact ID:</label>
            <input type="text" class="form-control" name="contact_id" value="<?php echo $row['contact_id'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Contact Name:</label>
            <input type="text" class="form-control" name="contact_name" value="<?php echo $row['contact_name'] ?>">
          </div>
        </div>

        <div class="col">
          <label class="form-label">Contact Student ID:</label>
          <input type="text" class="form-control" name="contact_studid" value="<?php echo $row['contact_studid'] ?>">
        </div>

         <div class="col">
          <label class="form-label">Contact Phone:</label>
          <input type="text" class="form-control" name="contact_phone" value="<?php echo $row['contact_phone'] ?>">
        </div>

         <div class="col">
          <label class="form-label">Contact email:</label>
          <input type="text" class="form-control" name="contact_email" value="<?php echo $row['contact_email'] ?>">
        </div>

 <div class="col">
          <label class="form-label">Comment:</label>
          <input type="text" class="form-control" name="contact_desc" value="<?php echo $row['contact_desc'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="contact.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>