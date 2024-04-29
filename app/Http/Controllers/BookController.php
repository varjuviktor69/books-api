<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Dtos\BookDto;
use App\Dtos\BookFilterDto;
use App\Interfaces\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController
{
    public function __construct(private BookService $bookService){}

    public function getAll(Request $request): JsonResponse
    {
        $books = $this->bookService->getAll(BookFilterDto::fromArray($request->all()));
        $totalCount = $this->bookService->getTotalCount();

        return response()->json([
            'books' => $books,
            'totalCount' => $totalCount,
        ]);
    }

    public function getById(int $id): JsonResponse
    {
        return response()->json($this->bookService->getById($id));
    }

    public function store(Request $request): JsonResponse
    {

        $dto = BookDto::fromArray($request->all());

        return response()->json($this->bookService->store($dto));
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $dto = BookDto::fromArray(array_merge($request->all(), ['id' => $id]));

        return response()->json($this->bookService->store($dto));
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->bookService->delete($id));
    }
}