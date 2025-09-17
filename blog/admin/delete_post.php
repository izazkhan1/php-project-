<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include '../db.php';

$id = intval($_GET['id']);
$conn->query("DELETE FROM posts WHERE id=$id");
header("Location: dashboard.php");
exit;
?>
