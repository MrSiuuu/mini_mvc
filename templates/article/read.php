<?php 
require_once _ROOTPATH_ . '/templates/header.php';
use App\Entity\User;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="card-title mb-4">
                        <?= htmlspecialchars($article->getTitle()); ?>
                    </h1>
                    
                    <div class="card-text article-content">
                        <?= nl2br(htmlspecialchars($article->getDescription())); ?>
                    </div>

                    <div class="mt-4 text-end">
                        <a href="index.php?controller=article&action=list" 
                           class="btn btn-outline-primary">
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>

            <!-- mes commentires -->
            <div class="mt-4">
                <h3 class="mb-4">Commentaires</h3>
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif; ?>

                <?php if (User::isLogged()): ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Ajouter un commentaire</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                </div>
                                <button type="submit" name="addComment" class="btn btn-primary">
                                    Publier
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">
                        <a href="index.php?controller=auth&action=login">Connectez-vous</a> pour ajouter un commentaire.
                    </div>
                <?php endif; ?>

                <?php if (!empty($comments)): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text">
                                    <?= nl2br(htmlspecialchars($comment->getComment())); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Aucun commentaire pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.article-content {
    line-height: 1.8;
    font-size: 1.1rem;
    color: #444;
}

.article-content p {
    margin-bottom: 1.5rem;
}
</style>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?> 