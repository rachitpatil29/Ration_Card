<?php session_start();
 $_SESSION['username'] = '';
  unset($_SESSION['username']); 
  session_destroy(); 
  header('location:login1.html'); ?>