<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\Domain\Actions;

use Lightit\Backoffice\Books\Domain\DataTransferObjects\BookDto;
use Lightit\Backoffice\Books\Domain\Models\Book;

class StoreBookAction
{
    public function execute(BookDto $bookDto): Book
    {
        $book = new Book([
            'name' => $bookDto->getName(),
            'email' => $bookDto->getEmail(),
            'password' => $bookDto->getPassword(),
        ]);

        $book->save();

        return $book;
    }
}
