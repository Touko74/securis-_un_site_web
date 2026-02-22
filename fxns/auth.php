<?php
session_start();

function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function requireAdmin() {
    if (!isAdmin()) {
        die("Accès refusé");
    }
}
