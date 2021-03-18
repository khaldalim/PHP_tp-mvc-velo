<?php


namespace App\model\velo;

use App\model\color\Color;

class Velo
{
    private $velo_id;
    private string $velo_name;
    private float $velo_price;
    private int $velo_height;
    private bool $velo_type;
    private bool $velo_suspension;
    private Color $velo_color;

    /**
     * Velo constructor.
     * @param $velo_id
     * @param string $velo_name
     * @param float $velo_price
     * @param int $velo_height
     * @param bool $velo_type
     * @param bool $velo_suspension
     * @param Color $velo_color
     */
    public function __construct($velo_id = null, string $velo_name, float $velo_price, int $velo_height, bool $velo_type, bool $velo_suspension, Color $velo_color)
    {
        $this->velo_id = $velo_id;
        $this->velo_name = $velo_name;
        $this->velo_price = $velo_price;
        $this->velo_height = $velo_height;
        $this->velo_type = $velo_type;
        $this->velo_suspension = $velo_suspension;
        $this->velo_color = $velo_color;
    }

    /**
     * @return mixed|null
     */
    public function getVeloId()
    {
        return $this->velo_id;
    }

    /**
     * @param mixed|null $velo_id
     */
    public function setVeloId($velo_id): void
    {
        $this->velo_id = $velo_id;
    }

    /**
     * @return string
     */
    public function getVeloName(): string
    {
        return $this->velo_name;
    }

    /**
     * @param string $velo_name
     */
    public function setVeloName(string $velo_name): void
    {
        $this->velo_name = $velo_name;
    }

    /**
     * @return float
     */
    public function getVeloPrice(): float
    {
        return $this->velo_price;
    }

    /**
     * @param float $velo_price
     */
    public function setVeloPrice(float $velo_price): void
    {
        $this->velo_price = $velo_price;
    }

    /**
     * @return int
     */
    public function getVeloHeight(): int
    {
        return $this->velo_height;
    }

    /**
     * @param int $velo_height
     */
    public function setVeloHeight(int $velo_height): void
    {
        $this->velo_height = $velo_height;
    }

    /**
     * @return bool
     */
    public function isVeloType(): bool
    {
        return $this->velo_type;
    }

    /**
     * @param bool $velo_type
     */
    public function setVeloType(bool $velo_type): void
    {
        $this->velo_type = $velo_type;
    }

    /**
     * @return bool
     */
    public function isVeloSuspension(): bool
    {
        return $this->velo_suspension;
    }

    /**
     * @param bool $velo_suspension
     */
    public function setVeloSuspension(bool $velo_suspension): void
    {
        $this->velo_suspension = $velo_suspension;
    }

    /**
     * @return Color
     */
    public function getVeloColor(): Color
    {
        return $this->velo_color;
    }

    /**
     * @param Color $velo_color
     */
    public function setVeloColor(Color $velo_color): void
    {
        $this->velo_color = $velo_color;
    }




}
