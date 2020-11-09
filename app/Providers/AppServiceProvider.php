<?php

namespace App\Providers;

use App\Repositories\JobRepository;
use App\Repositories\JobRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
    }
}
