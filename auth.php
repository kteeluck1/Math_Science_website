<?php
// Simple session-based auth helpers
session_start();

function is_logged_in(): bool {
    return !empty($_SESSION['user']);
}

function require_login(): void {
    if (!is_logged_in()) {
        $redirect = $_SERVER['REQUEST_URI'] ?? 'learning.php';
        $redirect = urlencode($redirect);
        header("Location: login.php?redirect={$redirect}");
        exit;
    }
}
