<?php
include "db_conn.php";
$activity_id = $_GET["activity_id"];
$sql = "DELETE FROM `activity` WHERE activity_id = $activity_id";
$result = mysqli_query($conn, $sql);	

if ($result) {
  header("Location: activity.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
