<?php
require '../src/view/partial/header.php'; ?>

<form method="post">

    <h1 class="h3 mb-3 fw-normal"><?= $titleForm ?> un vélo</h1>
    <?php
    if (isset($message)) {
        echo "<p>$message</p>";
        if (!empty($errors)) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li style='color: red'>$error</li>";
            }
            echo "</ul>";
        }
    }
    ?>

    <input type="text" name="name" id="inputName" class="form-control mb-3" placeholder="Nom" value="<?= $name ?>"
           required="" autofocus="">

    <div class="input-group mb-3">
        <input type="number" name="price" class="form-control" min="0" placeholder="00.00" step=".01" required
               value="<?= $price ?>">
        <div class="input-group-prepend">
            <span class="input-group-text">€</span>
        </div>
    </div>


    <input type="number" class="form-control mb-3" min="0" max="35" name="height" placeholder="Taille en pouces" step="1"
           value="<?= $height ?>"
           required>


    <!-- cadre -->
    <div class="mb-3 ">
        <label>Type de cadre</label>
        <?php
        //update
        if (isset($_GET['id'])) { ?>


            <div class="form-check">
                <input <?php if ($type == 0) echo "checked"; ?> class="form-check-input" type="radio" name="type"
                                                                id="type1" value="0">
                <label class="form-check-label" for="type1">
                    Femme
                </label>
            </div>
            <div class="form-check">
                <input <?php if ($type == 1) echo "checked"; ?> class="form-check-input" type="radio" name="type"
                                                                id="type2" value="1">
                <label class="form-check-label" for="type2">
                    Homme
                </label>
            </div>
        <?php } //insert
        else { ?>
            <div class="form-check">
                <input checked class="form-check-input" type="radio" name="type" id="type1" value="0">
                <label class="form-check-label" for="type1">
                    Femme
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="type2" value="1">
                <label class="form-check-label" for="type2">
                    Homme
                </label>
            </div>
        <?php } ?>
    </div>


    <!-- cadre -->
    <div class="mb-3 ">
        <label>Suspension</label>
        <?php
        //update
        if (isset($_GET['id'])) { ?>
            <div class="form-check">
                <input <?php if ($suspension == 0) echo "checked"; ?> class="form-check-input" type="radio"
                                                                      name="suspension" id="suspension1" value="0">
                <label class="form-check-label" for="suspension1">
                    Non
                </label>
            </div>
            <div class="form-check">
                <input <?php if ($suspension == 1) echo "checked"; ?> class="form-check-input" type="radio"
                                                                      name="suspension" id="suspension2" value="1">
                <label class="form-check-label" for="suspension2">
                    Oui
                </label>
            </div>
        <?php } //insert
        else { ?>
            <div class="form-check">
                <input checked class="form-check-input" type="radio" name="suspension" id="suspension1" value="0">
                <label class="form-check-label" for="suspension1">
                    Non
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="suspension" id="suspension2" value="1">
                <label class="form-check-label" for="suspension2">
                    Oui
                </label>
            </div>
        <?php } ?>
    </div>


    <div class="form-group mb-3">
        <label for="color">Couleur du Vélo</label>
        <select id="color" name="color" class="form-control">
            <?php foreach ($colors as $color) { ?>
                <option <?php if ($colorChoice == $color->getIdColor()) echo "selected"; ?>
                        value="<?= $color->getIdColor() ?>"><?= $color->getColorName() ?></option>
            <?php } ?>

        </select>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="velo_form" type="submit"><?= $titleForm ?></button>

</form>
<?php require '../src/view/partial/footer.php'; ?>
