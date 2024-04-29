<?php

declare(strict_types = 1);

namespace App\Interfaces;

use App\Dtos\BookDto;
use App\Dtos\BookFilterDto;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookService
{
    public function getAll(BookFilterDto $dto): Collection;

    public function getById(int $id): Book;

    public function store(BookDto $dto): Book;

    public function update(BookDto $dto): Book;

    public function delete(int $id): bool;

    public function getTotalCount(): int;
}