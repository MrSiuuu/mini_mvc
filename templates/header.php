<?php

use App\Entity\User;
use App\Tools\NavigationTools;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tes fichiers CSS personnalisés -->
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Bookeo</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mt-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Bookeo</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= NavigationTools::addActiveClass('page', 'home') ?>" 
                               href="index.php?controller=page&action=home">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= NavigationTools::addActiveClass('page', 'about') ?>" 
                               href="index.php?controller=page&action=about">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= NavigationTools::addActiveClass('article', 'list') ?>" 
                               href="index.php?controller=article&action=list">Articles</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex">
                        <?php if (User::isLogged()) { ?>
                            <a href="index.php?controller=auth&action=logout" 
                               class="btn btn-outline-danger">Déconnexion</a>
                        <?php } else { ?>
                            <a href="index.php?controller=auth&action=login" 
                               class="btn btn-outline-primary me-2 <?= NavigationTools::addActiveClass('auth', 'login') ?>">Connexion</a>
                            <a href="index.php?controller=user&action=register" 
                               class="btn btn-primary <?= NavigationTools::addActiveClass('user', 'register') ?>">Inscription</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
