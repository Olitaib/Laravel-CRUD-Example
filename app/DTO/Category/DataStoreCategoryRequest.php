<?php

namespace App\DTO\Category;

class DataStoreCategoryRequest
{

    private ?int $id;
    private ?string $name;
    private ?string $description;

    public function __construct(?int $id = null, ?string $name = null, ?string $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }

}
