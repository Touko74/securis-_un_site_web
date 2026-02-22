<?php
require 'db.php';
session_start();

if ($_POST) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit;
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<form method="post" class="login-container">
    <h2>Connexion</h2>

    <div class="input-group">
        <input type="text" name="username" required>
        <label>Nom d'utilisateur</label>
    </div>

    <div class="input-group">
        <input type="password" name="password" required>
        <label>Mot de passe</label>
    </div>

    <button type="submit" class="btn-login">Connexion</button>

    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</form>


<style>

  
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Inter", sans-serif;
}


body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: radial-gradient(circle at 20% 20%, #1e1e2f, #0d0d15);
    overflow: hidden;
}


body::before {
    content: "";
    position: absolute;
    width: 600px;
    height: 600px;
    background: linear-gradient(135deg, #6a5af9, #00d4ff);
    filter: blur(180px);
    opacity: 0.25;
    animation: float 12s infinite alternate ease-in-out;
}

@keyframes float {
    from { transform: translate(-100px, -80px); }
    to   { transform: translate(100px, 80px); }
}


.login-container {
    position: relative;
    width: 500px;
    padding: 40px;
    border-radius: 20px;
    backdrop-filter: blur(18px);
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
    animation: fadeIn 0.8s ease forwards;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.login-container h2 {
    text-align: center;
    color: #fff;
    margin-bottom: 25px;
    font-weight: 600;
    letter-spacing: 1px;
}


.input-group {
    position: relative;
    margin-bottom: 25px;
}

.input-group input {
    width: 100%;
    padding: 12px 10px;
    background: transparent;
    border: none;
    border-bottom: 2px solid #777;
    color: #fff;
    font-size: 16px;
    outline: none;
    transition: 0.3s;
}

.input-group label {
    position: absolute;
    left: 10px;
    top: 12px;
    color: #aaa;
    pointer-events: none;
    transition: 0.3s;
}


.input-group input:focus,
.input-group input:not(:placeholder-shown) {
    border-bottom-color: #6a5af9;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label {
    top: -10px;
    font-size: 12px;
    color: #6a5af9;
}

.btn-login {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #6a5af9, #00d4ff);
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: 600;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 212, 255, 0.3);
}


.error {
    margin-top: 15px;
    text-align: center;
    color: #ff6b6b;
    font-size: 14px;
}


</style>
