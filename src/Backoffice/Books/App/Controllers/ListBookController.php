<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lightit\Backoffice\Books\App\Transformers\BookTransformer;
use Lightit\Backoffice\Books\Domain\Actions\ListBookAction;

class ListBookController
{
    public function __invoke(
        Request $request,
        ListBookAction $action,
    ): JsonResponse {
        $Books = $action->execute($request->string('search')->toString());

        return responder()
            ->success($Books, BookTransformer::class)
            ->respond();
    }
}
