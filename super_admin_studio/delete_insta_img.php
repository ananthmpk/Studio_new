<?php

include("includes.php");

$id = $_GET['id'];

$delete = deleteInstaImg($id);

if ($delete) {
  echo "<script> window.location.assign('manage_insta_img.php')</script>";
} else {
  echo "<script> window.alert('Please Try Again Later!')</script>";
  echo "<script> window.location.assign('manage_insta_img.php')</script>";
}
