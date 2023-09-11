<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Process;

class GetDashboardDataAction
{
    public function __construct(
        protected GetWeatherAction $getWeatherAction,
        protected GetDefinitionOfWordAction $getDefinitionOfWordAction,
        protected GetADogFactAction $getADogFactAction
    ) {}

    public function execute(bool $async = false): array
    {
        if ($async) {
            $artisanPath = base_path('artisan');
            $result = Process::run("php {$artisanPath} async:get-dashboard-data");

            return json_decode($result->output(), true);
        }

        $weatherData = $this->getWeatherAction->execute();
        $definition = $this->getDefinitionOfWordAction->execute('sequential');
        $dogFact = $this->getADogFactAction->execute();

        return [
            'weather' => $weatherData,
            'definition' => $definition,
            'dog_fact' => $dogFact
        ];
    }
}
