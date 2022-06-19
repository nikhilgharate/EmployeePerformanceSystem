<?php
session_start();
if($_SESSION['type']!="manager"){
  header('location:logout.php?logout');
}
?>