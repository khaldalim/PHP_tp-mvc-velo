<?php
require '../src/view/partial/header.php';
$message = "";
if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'noId') {
        $message = "erreur lors de la suppression";
    } else {
        $message = "Le vélo avec l'id " . $_GET['delete'] . " à été supprimé";
    }
} elseif (isset($_GET['update'])) {
    if ($_GET['update'] == 'noId') {
        $message = "erreur lors de l'update";
    } else {
        $message = "Le vélo avec l'id " . $_GET['update'] . " à été mis à jour";
    }
}
echo "<p>$message</p>";
?>
<div class="table-responsive">
    <H1>Liste des Vélos</H1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix €</th>
            <th scope="col">Taille (cm)</th>
            <th scope="col">Type</th>
            <th scope="col">Suspension</th>
            <th scope="col">Couleur</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($velos as $velo) :
            $veloType = $velo->isVeloType() ? "Homme" : "Femme";
            $veloSuspension = $velo->isVeloSuspension() ? "Oui" : "Non";

            ?>

            <tr>
                <th scope='row'><?= $velo->getVeloId() ?></th>
                <td><?= $velo->getVeloName() ?></td>
                <td><?= $velo->getVeloPrice() ?></td>
                <td><?= $velo->getVeloHeight() ?></td>
                <td><?= $veloType ?></td>
                <td><?= $veloSuspension ?></td>
                <td><?= $velo->getVeloColor()->getColorName() ?></td>
                <td><a class='btn btn-success' href='update-velo?id=<?= $velo->getVeloId() ?>'> Modifier</a>
                    <a class='btn btn-danger' href='delete-velo?id=<?= $velo->getVeloId() ?>'
                       onclick='if (!confirm("Etes vous sur de vouloir supprimer ce velo ? ")) return false;'>
                        Supprimer
                    </a></td>
            </tr>
        <?php endforeach; ?>


        </tbody>


    </table>
</div>
<div>
    <a class='btn btn-info' href='add-velo'> Ajouter un Vélo</a>
</div>
<?php require '../src/view/partial/footer.php'; ?>
