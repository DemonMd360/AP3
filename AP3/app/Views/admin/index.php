<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
</head>
<body>
    <header>
        <div class="page-title">Administration</div>
        <div class="nav-right">
            <a href="<?= site_url('index') ?>" class="button">Retour à l’accueil</a>
        </div>
    </header>

    <main>
        <h2>Gestion des utilisateurs</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
            <?php foreach($personnes as $p): ?>
            <tr>
                <td><?= esc($p['idPersonne']) ?></td>
                <td><?= esc($p['Nom']) ?></td>
                <td><?= esc($p['Prenom']) ?></td>
                <td><?= esc($p['Email']) ?></td>
                <td><?= esc($p['Telephone']) ?></td>
                <td><?= esc($p['Adresse']) ?></td>
                <td><?= esc($p['idRole']) ?></td>
                <td>
                    <a href="<?= site_url('admin/delete/'.$p['idPersonne']) ?>" 
                       onclick="return confirm('Supprimer le compte de <?= esc($p['Prenom'].' '.$p['Nom']) ?> ?')" 
                       class="button-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>
