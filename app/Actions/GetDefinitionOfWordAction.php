<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class GetDefinitionOfWordAction
{
    public function execute(string $word): array
    {
        return Http::get(
            "https://api.dictionaryapi.dev/api/v2/entries/en/${word}"
        )
            ->json();
    }
}
