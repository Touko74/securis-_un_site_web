<?php
require 'db.php';
require 'auth.php';
requireAdmin();

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();

if ($_POST) {
    $stmt = $pdo->prepare("UPDATE articles SET titre = ?, contenu = ? WHERE id = ?");
    $stmt->execute([$_POST['titre'], $_POST['contenu'], $id]);
    header("Location: show.php?id=$id");
    exit;
}
?>

<form method="post">
    <input type="text" name="titre" value="<?= htmlspecialchars($article['titre']) ?>">
    <textarea name="contenu"><?= htmlspecialchars($article['contenu']) ?></textarea>
    <button type="submit">Modifier</button>
</form>
