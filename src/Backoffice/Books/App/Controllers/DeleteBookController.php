<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Books\Domain\Models\Book;

class DeleteBookController
{
    public function __invoke(Book $Book): JsonResponse
    {
        $Book->delete();

        return responder()
            ->success()
            ->respond();
    }
}
