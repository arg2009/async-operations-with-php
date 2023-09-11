<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class GetWeatherAction
{
    public function execute(): array
    {
        return Http::get(
            'https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&current_weather=true'
        )
            ->json();
    }
}
