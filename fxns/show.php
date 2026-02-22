<?php
require 'db.php';
require 'auth.php';
require 'header.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();
?>

<h1><?= htmlspecialchars($article['titre']) ?></h1>
<p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>

<?php if (isAdmin()): ?>
    <a href="edit.php?id=<?= $article['id'] ?>">Modifier</a>
    <a href="delete.php?id=<?= $article['id'] ?>">Supprimer</a>
<?php endif; ?>

<?php require 'footer.php'; ?>
