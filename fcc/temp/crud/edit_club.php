<?php
include "db_conn.php";
$club_id = $_GET["club_id"];

if (isset($_POST["submit"])) {
   $club_name = $_POST['club_name'];
   $club_owner = $_POST['club_owner'];
   $club_type = $_POST['club_type'];

  $sql = "UPDATE `club` SET `club_name`='$club_name',`club_owner`='$club_owner',`club_type`='$club_type' WHERE club_id = $club_id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: club.php?msg=Data updated successfully");
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
  <meta name="viewport" content="wclub_idth=device-wclub_idth, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP members Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    UiTMCK Update Club Information System
  </nav>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00fffff;">
<h5>| <a href="index.php">Home </a>| <a href="club.php">Club </a>| <a href="index.php">Membership</a> | <a href="activity.php">Activities </a> | <a href="contact.php">Contact Us</a> | </h5></p>
</nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Club Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
   $sql = "SELECT * FROM `club` WHERE club_id = $club_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="wclub_idth:50vw; min-wclub_idth:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="club_name" value="<?php echo $row['club_name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="club_owner" value="<?php echo $row['club_owner'] ?>">
          </div>
        </div>

      

        <div class="form-group mb-3">
          <label>Club Type:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="club_type" club_id="Academic Club" value="Academic Club" <?php echo ($row["club_type"] == 'Acacemic Club') ? "checked" : ""; ?>>
          <label for="Academic Club" class="form-input-label">Academic Club</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="club_type" club_id="Non-Academic Club" value="Non-Academic Club" <?php echo ($row["club_type"] == 'Non-Academic Club') ? "checked" : ""; ?>>
          <label for="Non-Academic Club" class="form-input-label">Non-Academic Club</label>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>