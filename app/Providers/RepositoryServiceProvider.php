<?php

namespace App\Providers;

use App\Repository\DomainRepository;
use App\Repository\DomainRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\EloquentRepositoryInterface;
use App\Repository\LandingRepository;
use App\Repository\LandingRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(LandingRepositoryInterface::class, LandingRepository::class);
        $this->app->bind(DomainRepositoryInterface::class, DomainRepository::class);
    }
}
