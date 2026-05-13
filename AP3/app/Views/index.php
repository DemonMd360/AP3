<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Animaux</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/index.css') ?>">
</head>
<body class="bg-dark text-light">

<header>
    <h1>Bienvenue sur AnimalWorld 🐾</h1>
    <div class="nav-right">
        <?php if(session()->get('isLoggedIn')): ?>
            Bonjour, <?= esc(session()->get('Prenom').' '.session()->get('Nom')) ?> 
            <a href="<?= site_url('auth/logout') ?>">Déconnexion</a>
            <a href="<?= site_url('personne/edit/'.session()->get('idPersonne')) ?>">Modifier</a>
            <a href="<?= site_url('personne/delete/'.session()->get('idPersonne')) ?>"
               onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?')">Supprimer</a>
        <?php else: ?>
            <a href="<?= site_url('auth/login') ?>">Connexion</a>
            <a href="<?= site_url('auth/register') ?>">Inscription</a>
        <?php endif; ?>

        <?php if(session()->get('isLoggedIn') && session()->get('idRole') == 3): ?>
            <a href="<?= site_url('admin') ?>" class="btn-warning">Administration</a>
        <?php endif; ?>
    </div>
</header>


<main class="container mt-4">
    <h2 class="text-center mb-4">Découvrez le monde des animaux 🦁🐼🐧</h2>

    <!-- Carousel Bootstrap -->
   <div id="animalCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="<?= base_url('image/lion.jpg') ?>" class="d-block w-100" alt="Lion majestueux">
            <div class="carousel-caption d-none d-md-block">
                <h5>Le Roi de la Savane</h5>
                <p>Puissance et noblesse.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="<?= base_url('image/panda.jpg') ?>" class="d-block w-100" alt="Panda mignon">
            <div class="carousel-caption d-none d-md-block">
                <h5>Panda</h5>
                <p>Douceur et tranquillité.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="<?= base_url('image/floow.jpg') ?>" class="d-block mx-auto d-block" alt="Pingouins">
            <div class="carousel-caption d-none d-md-block">
                <h5>Floow</h5>
                <p>Vie en communauté.</p>
            </div>
        </div>

    </div>

    <!-- Contrôles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#animalCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#animalCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
