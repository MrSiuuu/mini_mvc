<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container">
    <h1 class="mb-4">Liste des articles</h1>

    <?php if (!empty($articles)) { ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($articles as $article) { ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 mb-3">
                                <?= htmlspecialchars($article->getTitle()); ?>
                            </h3>
                            <p class="card-text text-truncate">
                                <?= htmlspecialchars($article->getDescription()); ?>
                            </p>
                            <a href="index.php?controller=article&action=read&id=<?= $article->getId(); ?>" 
                               class="btn btn-primary">
                                Lire plus
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            Aucun article disponible.
        </div>
    <?php } ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
