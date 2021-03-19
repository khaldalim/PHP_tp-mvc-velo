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
<H1>Liste des Vélos</H1>
<form class="form-inline">
    <div class="row">

        <div class=" form-group col-1">
            <label for="inputHeight" class="sr-only">ID</label>
            <input type="number" step="1" min="0" class="form-control" id="inputid" name="id">
        </div>

        <div class="form-group  col-2">
            <label for="inputName" class="sr-only">nom</label>
            <input type="text" class="form-control" id="inputName" name="name">
        </div>

        <div class="form-group col-1">
            <label for="inputPriceMin" class="sr-only">Prix min</label>
            <input type="number" step="0.01" min="0" class="form-control" id="inputPriceMin" name="priceMin">
        </div>

        <div class="form-group col-1">
            <label for="inputPriceMax" class="sr-only">Prix max </label>
            <input type="number" step="0.01" min="0" class="form-control" id="inputPriceMax" name="priceMax">
        </div>

        <div class=" form-group col-1">
            <label for="inputHeight" class="sr-only">Taille</label>
            <input type="number" step="1" min="0" max="35" class="form-control" id="inputHeight" name="height">
        </div>

        <div class="form-group col-2">
            <label for="type">Type</label>
            <select id="type" name="type" class="form-control">
                <option selected></option>
                <option value="0">Femme</option>
                <option value="1">Homme</option>
            </select>
        </div>

        <div class="form-group col-1">
            <label for="suspension">Suspension</label>
            <select id="suspension" name="suspension" class="form-control">
                <option selected></option>
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <div class="form-group col-1">
            <label for="color">Couleur</label>
            <select id="color" name="color" class="form-control">
                <option selected></option>
                <?php foreach ($colors as $color) { ?>
                    <option value="<?= $color->getIdColor() ?>"><?= $color->getColorName() ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-2">
            <br>
            <button type="submit" name="velo_search" class="btn btn-primary mb-2">Recherche</button>
        </div>

    </div>
</form>
<div class="table-responsive">


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix €</th>
            <th scope="col">Taille (pouces)</th>
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
    <a class='btn btn-info' style="color: #fff" href='add-velo'> Ajouter un Vélo</a>
</div>
<?php require '../src/view/partial/footer.php'; ?>
