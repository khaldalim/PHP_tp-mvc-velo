<?php


namespace App\model\color;

use PDO;

class ColorManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getColorByid($id): Color
    {
        $query = "SELECT * from color WHERE id_color = :id";
        $stm = $this->pdo->prepare($query);
        $stm->execute([
            ':id' => $id
        ]);
        $dataColor = $stm->fetch(PDO::FETCH_ASSOC);

        $color = null;
        if ($dataColor != null) {
            $color = new Color($dataColor['id_color'], $dataColor['color_name']);
        }

        return $color;

    }


    public function getAll(): array
    {
        $query = "SELECT * from color";
        $statement = $this->pdo->query($query);

        $colors = [];

        while ($color = $statement->fetch(PDO::FETCH_ASSOC)) {
            $colors[] = new Color($color['id_color'], $color['color_name']);
        }
        return $colors;
    }

}
