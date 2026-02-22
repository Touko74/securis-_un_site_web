<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Projet sécurité web</title>
</head>

<style>

/* styles header */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: white;
}


.site-header {
    position: sticky;
    top: 0;
    backdrop-filter: blur(12px);
    background: rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 1rem 2rem;
    z-index: 1000;
}


.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: auto;
}


.logo {
    font-size: 1.4rem;
    font-weight: 600;
    letter-spacing: 1px;
    color: #31154f;
    text-shadow: 0 0 5px rgba(49, 21, 79, 0.5);
    text-decoration: bold;
}


.nav-links {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.nav-links a {
    text-decoration: none;
    font-size: 2.2rem;
    color: "#31154f";
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    position: relative;
    transition: all 0.3s ease;
}


.nav-links a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 0%;
    height: 2px;
    background: #38bdf8;
    transition: width 0.3s ease;
}

.nav-links a:hover::after {
    width: 100%;
}


.btn {
    padding: 0.6rem 1.2rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    font-weight: 600;
}


.btn-primary {
    background: linear-gradient(135deg, #38bdf8, #6366f1);
    color: white;
    box-shadow: 0 4px 20px rgba(56, 189, 248, 0.4);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(99, 102, 241, 0.6);
}


.btn-outline {
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
}


@media (max-width: 768px) {
    .nav-container {
        flex-direction: column;
        gap: 1rem;
    }
}





/* Styles généraux */
    body {
    font-family: Arial, sans-serif;
    background: #779219;
    margin: 0;
    padding: 20px;
}

.page-title {
    color: #222;
    margin-bottom: 20px;
}

.btn-primary {
    display: inline-block;
    padding: 10px 18px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.2s ease;
    margin-bottom: 20px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.article-list {
    list-style: none;
    padding: 0;
}

.article-item {
    background: white;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 6px;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.article-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.article-link {
    text-decoration: none;
    color: #333;
    font-size: 18px;
    font-weight: 600;
}
</style>

<body>
<header class="site-header">
    <nav class="nav-container">
        <div class="logo">Films_app</div>

        <div class="nav-links">
            <a href="index.php">Accueil</a>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="logout.php" class="btn btn-outline">Déconnexion</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">Connexion</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<hr>
