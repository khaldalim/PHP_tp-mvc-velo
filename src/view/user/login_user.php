<?php
require '../src/view/partial/header.php';

/**
 * if (isset($_GET['login'])) {
if ($_GET['login'] == "error") {
$message = "Vous devez être connecté pour afficher d'autres pages !";
}
}
 */

?>


<main class="form-signin row justify-content-md-center">
    <div class="col-md-6 col-sm-12">
        <form method="post">

            <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>
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
            <label for="inputEmail" class="visually-hidden">Adresse email :</label>
            <input type="email" name="username" id="inputEmail" class="form-control mb-3" placeholder="Adresse Email"
                   required=""
                   autofocus="">
            <label for="inputPassword" class="visually-hidden">Mot de passe</label>
            <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Mot de passe"
                   required="">

            <button class="w-100 btn btn-lg btn-primary" name="login_form" type="submit">Se connecter</button>

        </form>
    </div>
</main>
<?php require '../src/view/partial/footer.php'; ?>
