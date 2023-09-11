<?php

declare(strict_types=1);

namespace App\AsyncTasks;

use App\Actions\GetDefinitionOfWordAction;
use App\Traits\CreatesApplication;
use Illuminate\Foundation\Application;
use Spatie\Async\Task;

class GetDefinitionOfAWordTask extends Task
{
    use CreatesApplication;

    protected Application $app;

    public function __construct(protected string $word)
    {}

    public function configure()
    {
        $this->app = $this->createApplication();
    }

    public function run()
    {
        return $this->app->make(GetDefinitionOfWordAction::class)->execute($this->word);
    }
}
