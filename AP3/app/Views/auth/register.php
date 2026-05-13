<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>
    <header>
        <div class="page-title">Créer un compte</div>
        <div class="nav-right">
            <a href="<?= site_url('index') ?>" class="button">Retour à l’accueil</a>
        </div>
    </header>

    <main>
        <div class="container">
            <form action="<?= site_url('auth/register') ?>" method="post">
                <label for="Nom">Nom :</label>
                <input type="text" name="Nom" required>

                <label for="Prenom">Prénom :</label>
                <input type="text" name="Prenom" required>

                <label for="Email">Email :</label>
                <input type="email" name="Email" required>

                <label for="Telephone">Téléphone :</label>
                <input type="text" name="Telephone">

                <label for="Adresse">Adresse :</label>
                <input type="text" name="Adresse">

                <label for="MotDePasse">Mot de passe :</label>
                <input type="password" name="MotDePasse" required>

                <button type="submit" class="button">S’inscrire</button>
            </form>
        </div>
    </main>
</body>
</html>
