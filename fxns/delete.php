<?php
require 'db.php';
require 'auth.php';
requireAdmin();

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>