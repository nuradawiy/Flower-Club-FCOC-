<?php
include "db_conn.php";
$contact_id = $_GET["contact_id"];
$sql = "DELETE FROM `contact` WHERE contact_id = $contact_id";
$result = mysqli_query($conn, $sql);	

if ($result) {
  header("Location: contact.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
