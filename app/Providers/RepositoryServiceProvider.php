<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repos = [
        \App\Contracts\UserContract::class                  => \App\Repositories\UserRepository::class,
        \App\Contracts\ClubContract::class                  => \App\Repositories\ClubRepository::class,
        \App\Contracts\FuneralContract::class               => \App\Repositories\FuneralRepository::class,
        \App\Contracts\GeneralStatisticContract::class      => \App\Repositories\GeneralStatisticRepository::class,
        \App\Contracts\InvoiceContract::class               => \App\Repositories\InvoiceRepository::class,
        \App\Contracts\OrderContract::class                 => \App\Repositories\OrderRepository::class,
        \App\Contracts\ProjectContract::class               => \App\Repositories\ProjectRepository::class,
        \App\Contracts\SewingClientContract::class          => \App\Repositories\SewingClientRepository::class,
        \App\Contracts\SewingWorkerContract::class          => \App\Repositories\SewingWorkerRepository::class,
        \App\Contracts\SubscriptionContract::class          => \App\Repositories\SubscriptionRepository::class,
        \App\Contracts\TeacherContract::class               => \App\Repositories\TeacherRepository::class,
        \App\Contracts\StudentContract::class               => \App\Repositories\StudentRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        foreach ($this->repos as $abstract => $implementation)
        {
            $this->app->singleton($abstract,$implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
