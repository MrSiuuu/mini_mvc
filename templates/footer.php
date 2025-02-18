</main>

<footer class="py-4 mt-5 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-3">Navigation</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="index.php" class="nav-link p-0 text-muted">Accueil</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="index.php?controller=page&action=about" class="nav-link p-0 text-muted">À propos</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="index.php?controller=article&action=list" class="nav-link p-0 text-muted">Articles</a>
                    </li>
                </ul>
            </div>
            
            <div class="col-md-6 text-md-end">
                <p class="text-muted mb-0">© <?= date('Y'); ?> - MVC</p>
                <p class="text-muted mb-0">Tous droits réservés</p>
            </div>
        </div>
    </div>
</footer>

</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>