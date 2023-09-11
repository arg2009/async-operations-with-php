<?php


declare(strict_types=1);

namespace App\AsyncTasks;

use App\Actions\GetWeatherAction;
use App\Traits\CreatesApplication;
use Illuminate\Foundation\Application;
use Spatie\Async\Task;

class GetWeatherTask extends Task
{
    use CreatesApplication;

    protected Application $app;

    public function configure()
    {
        $this->app = $this->createApplication();
    }

    public function run()
    {
        return $this->app->make(GetWeatherAction::class)->execute();
    }
}
