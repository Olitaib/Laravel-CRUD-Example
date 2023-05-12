<?php

namespace App\DTO\Category;

class DataStoreCategoryResponse
{

    public ?int  $id;
    public ?string  $name;
    public ?string $description;
    public ?array $messages;

    public function __construct(?object $data = null, ?array $messages = null)
    {
        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
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

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->id,
            'description' => $this->description
        ];
    }
}
