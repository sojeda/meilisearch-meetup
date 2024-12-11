<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Books\App\Request\StoreBookRequest;
use Lightit\Backoffice\Books\App\Transformers\BookTransformer;
use Lightit\Backoffice\Books\Domain\Actions\StoreBookAction;

class StoreBookController
{
    public function __invoke(StoreBookRequest $request, StoreBookAction $storeBookAction): JsonResponse
    {
        $Book = $storeBookAction->execute($request->toDto());

        return responder()
            ->success($Book, BookTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
