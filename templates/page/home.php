<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container">
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-4 fw-bold">Bienvenue sur notre site</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                Découvrez nos derniers articles et restez informé des dernières actualités.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="index.php?controller=article&action=list" class="btn btn-primary btn-lg px-4 gap-3">
                    Voir les articles
                </a>
                <a href="index.php?controller=page&action=about" class="btn btn-outline-secondary btn-lg px-4">
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>