<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer mon compte</title>
    <link rel="stylesheet" href="<?= base_url('css/delete.css') ?>">
</head>
<body>
    <header>
        <div class="page-title">Supprimer mon compte</div>
        <div class="nav-right">
            <a href="<?= site_url('index') ?>" class="button">Retour à l’accueil</a>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Confirmation</h2>
            <p>Voulez-vous vraiment supprimer votre compte ? Cette action est irréversible.</p>
            <div class="actions">
                <a href="<?= site_url('personne/delete/'.session()->get('idPersonne')) ?>" 
                   onclick="return confirm('Confirmer la suppression de votre compte ?')" 
                   class="button-danger">Supprimer</a>
                <a href="<?= site_url('index') ?>" class="button-neutral">Annuler</a>
            </div>
        </div>
    </main>
</body>
</html>
