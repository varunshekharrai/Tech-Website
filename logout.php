<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["bid"]);
header("location:index.php");
?>
