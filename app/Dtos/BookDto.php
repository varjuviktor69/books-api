<?php

declare(strict_types=1);

namespace App\Dtos;

use Carbon\CarbonImmutable;
use Illuminate\Contracts\Support\Arrayable;

class BookDto implements Arrayable
{
    private ?int $id;
    private string $author;
    private string $title;
    private CarbonImmutable $publishDate;
    private string $isbn;
    private string $summary;
    private int $price;
    private int $onStore;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? null;
        $dto->author = $data['author'];
        $dto->title = $data['title'];
        $dto->publishDate = CarbonImmutable::parse($data['publish_date']);
        $dto->isbn = $data['isbn'];
        $dto->summary = $data['summary'];
        $dto->price = (int) $data['price'];
        $dto->onStore = (int) $data['on_store'];

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'author' => $this->author,
            'title' => $this->title,
            'publish_date' => $this->publishDate,
            'isbn' => $this->isbn,
            'summary' => $this->summary,
            'price' => $this->price,
            'on_store' => $this->onStore,
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
