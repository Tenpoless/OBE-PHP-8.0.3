<?php

namespace App\Providers;

use App\Repositories\CplRepository;
use App\Repositories\EvalRepository;
use App\Repositories\SubCpmkRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DetailRpsRepository;
use App\Repositories\MatkulCplRepository;
use App\Interfaces\CplRepositoryInterface;
use App\Repositories\PengampuMkRepository;
use App\Interfaces\EvalRepositoryInterface;
use App\Interfaces\SubCpmkRepositoryInterface;
use App\Interfaces\DetailRpsRepositoryInterface;
use App\Interfaces\MatkulCplRepositoryInterface;
use App\Interfaces\PengampuMkRepositoryInterface;
use App\Repositories\EvalMhsRepository;
use App\Repositories\EvalMhsDataRepository;
use App\Repositories\EvalMhsDetailRepository;
use App\Repositories\HalUtamaRepository;
use App\Interfaces\EvalMhsRepositoryInterface;
use App\Interfaces\EvalMhsDataRepositoryInterface;
use App\Interfaces\EvalMhsDetailRepositoryInterface;
use App\Interfaces\HalUtamaRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EvalRepositoryInterface::class, EvalRepository::class);
        $this->app->bind(DetailRpsRepositoryInterface::class, DetailRpsRepository::class);
        $this->app->bind(SubCpmkRepositoryInterface::class, SubCpmkRepository::class);
        $this->app->bind(PengampuMkRepositoryInterface::class, PengampuMkRepository::class);
        $this->app->bind(CplRepositoryInterface::class, CplRepository::class);
        $this->app->bind(MatkulCplRepositoryInterface::class, MatkulCplRepository::class);
        $this->app->bind(HalUtamaRepositoryInterface::class, HalUtamaRepository::class);
        $this->app->bind(EvalMhsRepositoryInterface::class, EvalMhsRepository::class);
        $this->app->bind(EvalMhsDataRepositoryInterface::class, EvalMhsDataRepository::class);
        $this->app->bind(EvalMhsDetailRepositoryInterface::class, EvalMhsDetailRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
