<?php

namespace App\Entity;

class Package
{
    protected string $title;
    protected string $description;
    protected string $price;
    protected string $discount;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param float $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $discount
     */
    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return string
     */
    public function getDiscount(): string
    {
        return $this->discount;
    }
}