<?php

declare(strict_types=1);

namespace App\Dtos;

class BookFilterDto 
{
    private int $limit = 10;
    private int $offset = 0;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        if (isset($data['limit'])) {
            $dto->limit = (int) $data['limit'];
        }

        if (isset($data['offset'])) {
            $dto->offset = (int) $data['offset'];
        }

        return $dto;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}
