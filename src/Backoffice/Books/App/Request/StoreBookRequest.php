<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Lightit\Backoffice\Books\Domain\DataTransferObjects\BookDto;

class StoreBookRequest extends FormRequest
{
    public const NAME = 'name';

    public const EMAIL = 'email';

    public const PASSWORD = 'password';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required'],
            self::EMAIL => ['required', 'email:strict'],
            self::PASSWORD => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ];
    }

    public function toDto(): BookDto
    {
        return new BookDto(
            name: $this->string(self::NAME)->toString(),
            email: $this->string(self::EMAIL)->toString(),
            password: $this->string(self::PASSWORD)->toString(),
        );
    }
}
