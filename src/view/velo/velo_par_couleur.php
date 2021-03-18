<?php
require '../src/view/partial/header.php'; ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Couleur</th>
        <th scope="col">Nombre de vélos</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($veloNumberbyColor as $number) {
        echo "
<tr>
        <td>" . $number['color_name'] . "</td>
        <td>{$number['number']}</td>";
    } ?>


    </tr>

    </tbody>
</table>
<?php require '../src/view/partial/footer.php'; ?>
