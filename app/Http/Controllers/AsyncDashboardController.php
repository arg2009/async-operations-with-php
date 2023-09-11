<?php

namespace App\Http\Controllers;

use App\Actions\GetDashboardDataAction;
use Illuminate\Http\Request;

class AsyncDashboardController extends Controller
{
    public function __construct(
        protected GetDashboardDataAction $getDashboardDataAction
    ) {}

    public function show(): array
    {
        return $this->getDashboardDataAction->execute(async: true);
    }
}
