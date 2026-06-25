<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'MU Forum') ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="container">
    <header class="hero-header small">
        <div>
            <p class="eyebrow">Red Devils Indonesia</p>
            <h1>MU Forum</h1>
        </div>
    </header>
    <nav class="main-nav public-only">
        <a href="<?= base_url('/'); ?>">Home</a>
        <a href="<?= base_url('/artikel'); ?>">Artikel</a>
        <a href="<?= base_url('/about'); ?>">About</a>
        <a href="<?= base_url('/contact'); ?>">Kontak</a>
        <a href="<?= base_url('/faqs'); ?>">FAQ</a>
    </nav>
    <section id="wrapper">
        <main id="main">
