<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\GetDashboardDataAction;

class DashboardController extends Controller
{
    public function __construct(
        protected GetDashboardDataAction $getDashboardDataAction
    ) {}

    public function show(): array
    {
        return $this->getDashboardDataAction->execute();
    }
}
