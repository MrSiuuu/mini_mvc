<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h1 class="card-title text-center mb-4">À propos de nous</h1>
                    
                    <div class="card-text">
                        <p class="lead mb-4">
                            Bienvenue sur notre plateforme d'articles et d'actualités.
                        </p>

                        <p>
                            Notre mission est de vous tenir informé des dernières nouvelles et tendances 
                            dans différents domaines. Nous nous efforçons de fournir un contenu de qualité, 
                            pertinent et accessible à tous.
                        </p>

                        <p>
                            N'hésitez pas à parcourir nos articles et à créer un compte pour profiter 
                            de toutes les fonctionnalités de notre plateforme.
                        </p>

                        <div class="text-center mt-4">
                            <a href="index.php?controller=article&action=list" class="btn btn-primary">
                                Découvrir nos articles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
