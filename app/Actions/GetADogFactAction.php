<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class GetADogFactAction
{
    public function execute(): array
    {
        return Http::get(
            'https://dog-api.kinduff.com/api/facts'
        )
        ->json();
    }
}
