<?php

include("includes.php");

$id = $_GET['id'];

$delete = deleteTeam($id);

if ($delete) {
  echo "<script> window.location.assign('manage_team.php')</script>";
} else {
  echo "<script> window.alert('Please Try Again Later!')</script>";
  echo "<script> window.location.assign('manage_team.php')</script>";
}