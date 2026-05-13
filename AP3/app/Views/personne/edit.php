<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier mon compte</title>
    <link rel="stylesheet" href="<?= base_url('css/edit.css') ?>">
</head>
<body>
    <!-- Header avec titre et bouton retour -->
    <header>
        <div class="page-title">Modifier mon compte</div>
        <div class="nav-right">
            <a href="<?= site_url('index') ?>" class="button">Retour à l’accueil</a>
        </div>
    </header>

    <!-- Contenu principal centré -->
    <main>
        <div class="container">
            <form action="<?= site_url('personne/edit/'.session()->get('idPersonne')) ?>" method="post">
                
                <label for="Nom">Nom :</label>
                <input type="text" name="Nom" value="<?= esc($personne['Nom']) ?>" required>

                <label for="Prenom">Prénom :</label>
                <input type="text" name="Prenom" value="<?= esc($personne['Prenom']) ?>" required>

                <label for="Email">Email :</label>
                <input type="email" name="Email" value="<?= esc($personne['Email']) ?>" required>

                <label for="Telephone">Téléphone :</label>
                <input type="text" name="Telephone" value="<?= esc($personne['Telephone']) ?>">

                <label for="Adresse">Adresse :</label>
                <input type="text" name="Adresse" value="<?= esc($personne['Adresse']) ?>">

                <!-- Bouton centré sous les champs -->
                <button type="submit" class="button">Enregistrer les modifications</button>
            </form>
        </div>
    </main>
</body>
</html>
