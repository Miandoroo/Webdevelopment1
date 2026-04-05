<?php

declare(strict_types=1);

use App\Helpers\AuthHelper;

$title = $pageTitle ?? 'Gym Class Booking Platform';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/site.css">
</head>
<body data-theme="light">
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="/">Gym Booking</a>
        <div class="d-flex gap-3 align-items-center">
            <a href="/classes" class="nav-link">Classes</a>
            <a href="/trainers" class="nav-link">Trainers</a>
            <?php if (AuthHelper::check()): ?>
                <a href="/dashboard" class="nav-link">Dashboard</a>
                <form action="/logout" method="post" class="m-0">
                    <button class="btn btn-outline-dark btn-sm" type="submit">Logout</button>
                </form>
            <?php else: ?>
                <a href="/login" class="btn btn-dark btn-sm">Login</a>
            <?php endif; ?>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-theme-toggle>Theme</button>
        </div>
    </div>
</nav>
<main class="container pb-5">
