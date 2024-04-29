<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Book;
use App\Dtos\BookDto;
use App\Dtos\BookFilterDto;
use App\Interfaces\BookService;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class BookServiceImpl implements BookService
{
    public function getAll(BookFilterDto $dto): Collection
    {
        return Book::limit($dto->getLimit())->offset($dto->getOffset())
            ->select('id', 'author', 'title')->get();
    }

    public function getById(int $id): Book
    {
        return Book::findOrFail($id);
    }

    public function store(BookDto $dto): Book
    {
        return Book::create($dto->toArray());
    }

    public function update(BookDto $dto): Book
    {
        $book = Book::findOrFail($dto->getId());

        return $book->update([$dto->toArray()]);
    }

    public function delete(int $id): bool
    {
        $book = Book::findOrFail($id);

        return $book->delete();
    }

    public function getTotalCount(): int
    {
        return Book::count();
    }
}