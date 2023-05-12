<?php

namespace App\DTO\Product;

class DataStoreProductRequest
{

    private ?int $id;
    private ?int $category_id;
    private ?string $title;
    private ?float $price;
    private ?string $description;

    public function __construct(?int $id = null, ?int $category_id = null, ?string $title = null, ?float $price = null, ?string $description = null)
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function toArray(): array
    {
        $return = [];
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description
        ];
    }

}
