<?php


namespace App\model\velo;

use App\database\Connection;
use App\model\color\Color;
use App\model\color\ColorManager;
use PDO;

class VeloManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $query = "SELECT * from velo";
        $statement = $this->pdo->query($query);

        $velos = [];

        while ($velo = $statement->fetch(PDO::FETCH_ASSOC)) {
            $pdo = Connection::getPdo();
            $colormanager = new ColorManager($pdo);
            $color = $colormanager->getColorByid($velo['velo_color']);
            $velos[] = new Velo($velo['velo_id'], $velo['velo_name'], $velo['velo_price'], $velo['velo_height'], $velo['velo_type'], $velo['velo_suspension'], $color);
        }
        return $velos;
    }

    public function getOne($id): Velo
    {
        $query = "SELECT * from velo WHERE velo_id = :id";
        $stm = $this->pdo->prepare($query);
        $stm->execute([
            ':id' => $id
        ]);
        $dataVelo = $stm->fetch(PDO::FETCH_ASSOC);


        if (!$dataVelo) {
            header('Location: /list-velo?delete=noId');
            exit();
        }
        if ($dataVelo != null) {
            $pdo = Connection::getPdo();
            $colormanager = new ColorManager($pdo);
            $color = $colormanager->getColorByid($dataVelo['velo_color']);
            $velo = new Velo($dataVelo['velo_id'], $dataVelo['velo_name'], $dataVelo['velo_price'], $dataVelo['velo_height'], $dataVelo['velo_type'], $dataVelo['velo_suspension'], $color);
        }

        return $velo;
    }

    public function handleRequest($id = null)
    {

        $pdo = Connection::getPdo();
        $name = filter_input(INPUT_POST, 'name');

        if (filter_input(INPUT_POST, 'price') != "") {
            $price = filter_input(INPUT_POST, 'price');
        } else {
            $price = 0;
        }

        if (filter_input(INPUT_POST, 'height') != "") {
            $height = filter_input(INPUT_POST, 'height');
        } else {
            $height = 0;
        }

        if (filter_input(INPUT_POST, 'type') != null) {
            $type = filter_input(INPUT_POST, 'type');
        } else {
            $type = false;
        }
        if (filter_input(INPUT_POST, 'suspension') != null) {
            $suspension = filter_input(INPUT_POST, 'suspension');
        } else {
            $suspension = false;
        }

        $colorId = filter_input(INPUT_POST, 'color');
        $colormanager = new ColorManager($pdo);
        $color = $colormanager->getColorByid($colorId);

        return new Velo($id, $name, $price, $height, $type, $suspension, $color);


    }

    public function validate(Velo $velo)
    {
        var_dump($velo);
        $errors = [];


        if ($velo->getVeloName() == "null") {
            $errors['name'] = "pas de nom";
        }
        if ($velo->getVeloPrice() == "") {
            $errors['price'] = "veuillez entrer un prix";
        }
        if ($velo->getVeloHeight() == "") {
            $errors['price'] = "veuillez entrer une taille";
        }
        if (!is_bool($velo->isVeloType())) {
            $errors['price'] = "choisir homme ou femme";
        }
        if (!is_bool($velo->isVeloSuspension())) {
            $errors['price'] = "veuillez choisir oui ou non ";
        }
        return $errors;
    }

    public function insert(Velo $velo)
    {
        $sql = "INSERT INTO velo (velo_name, velo_price, velo_height, velo_type, velo_suspension, velo_color)
                VALUES (:name, :price, :height, :type, :suspension, :color )";
        $stm = $this->pdo->prepare($sql);

        $type = $velo->isVeloType() ? 1 : 0;
        $suspension = $velo->isVeloSuspension() ? 1 : 0;

        $insertok = $stm->execute([
            ':name' => $velo->getVeloName(),
            ':price' => $velo->getVeloPrice(),
            ':height' => $velo->getVeloHeight(),
            ':type' => $type,
            ':suspension' => $suspension,
            ':color' => $velo->getVeloColor()->getIdColor()
        ]);

        return $insertok;
    }

    public function update(Velo $velo)
    {
        $sql = "UPDATE velo set 
                    velo_name = :name,
                    velo_price = :price,
                    velo_height = :height,
                    velo_type = :type,
                    velo_suspension = :suspension,
                    velo_color  = :color
                WHERE velo_id = :id


               ";
        $stm = $this->pdo->prepare($sql);

        $type = $velo->isVeloType() ? 1 : 0;
        $suspension = $velo->isVeloSuspension() ? 1 : 0;

        $updateOk = $stm->execute([
            ':name' => $velo->getVeloName(),
            ':price' => $velo->getVeloPrice(),
            ':height' => $velo->getVeloHeight(),
            ':type' => $type,
            ':suspension' => $suspension,
            ':color' => $velo->getVeloColor()->getIdColor(),
            ':id' => $velo->getVeloId()
        ]);

        return $updateOk;
    }

    public function delete(Velo $velo)
    {
        $sql = "DELETE FROM velo WHERE velo_id = :id;";
        $statement = $this->pdo->prepare($sql);
        $deleteOk = $statement->execute([':id' => $velo->getVeloId()]);
        return $deleteOk;

    }

    public function selectNumbersofVeloByColor(PDO $pdo)
    {
        $sql = "SELECT C.color_name, COUNT(*) as number FROM color as C INNER JOIN velo AS V ON C.id_color = V.velo_color GROUP BY C.color_name";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}
