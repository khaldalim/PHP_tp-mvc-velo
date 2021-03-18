<?php


namespace App\model\color;


class Color
{
    private $id_color;
    private $color_name;

    /**
     * Color constructor.
     * @param $id_color
     * @param $color_name
     */
    public function __construct($id_color = null, $color_name)
    {
        $this->id_color = $id_color;
        $this->color_name = $color_name;
    }

    /**
     * @return mixed|null
     */
    public function getIdColor()
    {
        return $this->id_color;
    }

    /**
     * @param mixed|null $id_color
     */
    public function setIdColor($id_color): void
    {
        $this->id_color = $id_color;
    }

    /**
     * @return mixed
     */
    public function getColorName()
    {
        return $this->color_name;
    }

    /**
     * @param mixed $color_name
     */
    public function setColorName($color_name): void
    {
        $this->color_name = $color_name;
    }


}


