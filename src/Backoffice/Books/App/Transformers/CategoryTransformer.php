<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Books\Domain\Models\Category;

class CategoryTransformer extends Transformer
{
    public function transform(Category $category): array
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
        ];
    }
}
