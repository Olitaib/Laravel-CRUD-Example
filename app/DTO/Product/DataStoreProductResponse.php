<?php

namespace App\DTO\Product;

class DataStoreProductResponse {

    public ?int  $id;

    public ?int $category_id;
    public ?string $title;
    public ?float $price;
    public ?string $description;
    public ?array $messages;

    public function __construct(?object $data = null, ?array $messages = null)
    {
        if ($data) {
            $this->id = $data['id'];
            $this->category_id = $data['category_id'];
            $this->title = $data['title'];
            $this->price = $data['price'];
            $this->description = $data['description'];
        }

        if ($messages) {
            $this->messages = $messages;
        }
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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description
        ];
    }
}
