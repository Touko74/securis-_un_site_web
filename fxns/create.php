<?php
require 'db.php';
require 'auth.php';
require 'header.php';
requireAdmin();

if ($_POST) {
    $stmt = $pdo->prepare("INSERT INTO articles (titre, contenu) VALUES (?, ?)");
    $stmt->execute([$_POST['titre'], $_POST['contenu']]);
    header("Location: index.php");
    exit;
}
?>

<div class="form-wrapper">
    <form method="post" class="modern-form">
        <h2>Créer un article</h2>

        <div class="input-group">
            <input type="text" name="titre" placeholder=" " required>
            <label>Titre</label>
        </div>

        <div class="input-group">
            <textarea name="contenu" placeholder=" " rows="5" required></textarea>
            <label>Contenu</label>
        </div>

        <button type="submit" class="btn-submit">Créer</button>
    </form>
</div>
<style>
    
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


.form-wrapper {
    width: 100%;
    max-width: 450px;
    padding: 20px;
}


.modern-form {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 2rem;
    border-radius: 20px;
    color: white;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
}


.modern-form h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    font-weight: 600;
}


.input-group {
    position: relative;
    margin-bottom: 1.5rem;
}


.input-group input,
.input-group textarea {
    width: 100%;
    padding: 1rem;
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.05);
    color: white;
    outline: none;
    font-size: 1rem;
    transition: all 0.3s ease;
}


.input-group input:focus,
.input-group textarea:focus {
    border-color: #38bdf8;
    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.3);
}


.input-group label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.6);
    pointer-events: none;
    transition: 0.3s ease;
}

.input-group textarea + label {
    top: 1.2rem;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label,
.input-group textarea:focus + label,
.input-group textarea:not(:placeholder-shown) + label {
    top: -8px;
    left: 0.8rem;
    font-size: 0.75rem;
    background: #0f172a;
    padding: 0 6px;
    color: #38bdf8;
}


.btn-submit {
    width: 100%;
    padding: 0.9rem;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #38bdf8, #6366f1);
    color: white;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: 0.3s ease;
    box-shadow: 0 4px 20px rgba(56, 189, 248, 0.4);
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(99, 102, 241, 0.6);
}


@media (max-width: 500px) {
    .modern-form {
        padding: 1.5rem;
    }
}
</style>