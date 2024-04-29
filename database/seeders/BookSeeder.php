<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Dtos\BookDto;
use App\Models\Book;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use JsonException;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $file = public_path('uploads' . DIRECTORY_SEPARATOR . 'books.json');
            $content = File::json($file, JSON_THROW_ON_ERROR);

            foreach($content as $book) {
                $dto = BookDto::fromArray($book);

                Book::create($dto->toArray());
            }

        } catch (JsonException | FileNotFoundException $ex) {
            error_log(PHP_EOL . $ex->getMessage() . PHP_EOL);
        }
    }
}
