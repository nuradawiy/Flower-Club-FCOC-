<?php
include "db_conn.php";
$id = $_GET["club_id"];
$sql = "DELETE FROM `club` WHERE club_id = $id";
$result = mysqli_query($conn, $sql);	

if ($result) {
  header("Location: club.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
