<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>
    <header>
        <div class="page-title">Connexion</div>
        <div class="nav-right">
            <a href="<?= site_url('index') ?>" class="button">Retour à l’accueil</a>
        </div>
    </header>

    <main>
        <div class="container">
            <form action="<?= site_url('auth/login') ?>" method="post">
                <label for="email">Email :</label>
                <input type="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required>

                <button type="submit" class="button">Se connecter</button>
            </form>
        </div>
    </main>
</body>
</html>
