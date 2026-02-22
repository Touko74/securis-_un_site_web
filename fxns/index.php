<?php
require 'db.php';
require 'auth.php';
require 'header.php';

$articles = $pdo->query("SELECT * FROM articles")->fetchAll();
?>

<h1 class="page-title">Liste des articles</h1>

<?php if (isAdmin()): ?>
    <a href="create.php" class="btn-primary">Créer un article</a>
<?php endif; ?>

<ul class="article-list">
<?php foreach ($articles as $a): ?>
    <li class="article-item">
        <a href="show.php?id=<?= $a['id'] ?>" class="article-link">
            <?= htmlspecialchars($a['titre']) ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php require 'footer.php'; ?>
