<?php

function requireLogin()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_id'])) {
        header("Location: /forbidden");
        exit;
    }
}

function requireRole($minRole)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] > $minRole) {
        header("Location: /forbidden");
        exit;
    }
}
