<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\AsyncTasks\GetADogFactTask;
use App\AsyncTasks\GetDefinitionOfAWordTask;
use App\AsyncTasks\GetWeatherTask;
use Illuminate\Console\Command;
use Spatie\Async\Pool;

class GetDashboardDataAsynchronously extends Command
{
    protected $signature = 'async:get-dashboard-data';

    protected $description = 'Get the Dashboard Data Asynchronously';

    public function handle()
    {
        $data = [];

        $pool = Pool::create();

        $pool
            ->add(new GetWeatherTask())
            ->then(function (array $weatherData) use (&$data) {
                $data['weather'] = $weatherData;
            });

        $pool
            ->add(new GetDefinitionOfAWordTask('asynchronous'))
            ->then(function (array $definition) use (&$data) {
                $data['definition'] = $definition;
            });

        $pool
            ->add(new GetADogFactTask())
            ->then(function (array $dogFact) use (&$data) {
                $data['dog_fact'] = $dogFact;
            });

        $pool->wait();

        $this->line(json_encode($data));
    }
}
