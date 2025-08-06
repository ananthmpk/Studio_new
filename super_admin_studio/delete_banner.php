<?php

include("includes.php");

$id = $_GET['id'];

$delete = deleteBanner($id);

if ($delete) {
  echo "<script> window.location.assign('manage_banner.php')</script>";
} else {
  echo "<script> window.alert('Please Try Again Later!')</script>";
  echo "<script> window.location.assign('manage_banner.php')</script>";
}