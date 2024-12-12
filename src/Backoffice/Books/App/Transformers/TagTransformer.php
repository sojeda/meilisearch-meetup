<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Books\Domain\Models\Tag;

class TagTransformer extends Transformer
{
    public function transform(Tag $tag): array
    {
        return [
            $tag->name,
        ];
    }
}
