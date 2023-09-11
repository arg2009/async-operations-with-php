<?php

declare(strict_types=1);

namespace App\AsyncTasks;

use App\Actions\GetADogFactAction;
use App\Traits\CreatesApplication;
use Illuminate\Foundation\Application;
use Spatie\Async\Task;

class GetADogFactTask extends Task
{
    use CreatesApplication;

    protected Application $app;

    public function configure()
    {
        $this->app = $this->createApplication();
    }

    public function run()
    {
        return $this->app->make(GetADogFactAction::class)->execute();
    }
}
