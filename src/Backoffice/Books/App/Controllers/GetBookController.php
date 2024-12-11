<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Books\App\Transformers\BookTransformer;
use Lightit\Backoffice\Books\Domain\Models\Book;

class GetBookController
{
    public function __invoke(Book $Book): JsonResponse
    {
        return responder()
            ->success($Book, BookTransformer::class)
            ->respond();
    }
}
