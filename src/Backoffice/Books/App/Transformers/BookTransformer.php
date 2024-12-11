<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Books\Domain\Models\Book;
use Lightit\Backoffice\Users\App\Transformers\UserTransformer;

class BookTransformer extends Transformer
{
    protected $load = [
        'tags' => TagTransformer::class,
        'author' => UserTransformer::class,
        'category' => CategoryTransformer::class,
    ];

    public function transform(Book $book): array
    {
        return [
            'id' => $book->id,
            'title' => $book->title,
            'description' => $book->description,
        ];
    }
}
