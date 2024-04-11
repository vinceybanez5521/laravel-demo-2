<?php

namespace App\Providers;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\EmployeeMsSqlRepository;
use App\Repositories\EmployeeMySqlRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Decide which class will be passed/injected to the constructor of EmployeeController
        if(1 === 2) {
            $this->app->bind(EmployeeRepositoryInterface::class, EmployeeMySqlRepository::class);
        } else {
            // dd('Hello');
            $this->app->bind(EmployeeRepositoryInterface::class, EmployeeMsSqlRepository::class);
        }
    }
}
