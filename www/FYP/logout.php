<?php
session_start();
include "connect.php";

$ID = $_SESSION["ID"];

session_destroy();

header("Location: index.php");
?>