<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Books\Domain\Models\Book;

class ListBookAction
{
    /**
     * @return Collection<int, Book>
     */
    public function execute(string $search): Collection
    {
        return Book::query()
            ->where('title', 'ilike', "%$search%")
            ->orWhereHas('author', function ($query) use ($search) {
                $query->where('name', 'ilike', "%$search%");
            })            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'ilike', "%$search%");
            })
            ->orWhereHas('tags', function ($query) use ($search) {
                $query->where('name', 'ilike', "%$search%");
            })
            ->get();
    }
}
