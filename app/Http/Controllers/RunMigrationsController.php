<?php

namespace App\Http\Controllers;

use OrdersTableMigration;
use ProductsTableMigration;
use OrderProductTableMigration;
use App\Services\MigrationService;

/**
 * Class RunMigrationsController
 *
 * @package App\Http\Controllers
 */
class RunMigrationsController extends Controller
{
    /**
     * @param MigrationService $migrationService
     * @return array
     * @throws \App\Exceptions\MigrationServiceException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __invoke(MigrationService $migrationService)
    {
        return $this->json(
            $migrationService->migrate($this->migrations())
        );
    }

    /**
     * List of migrations to migrate.
     *
     * @return array
     */
    protected function migrations(): array
    {
        return [
            ProductsTableMigration::class,
            OrdersTableMigration::class,
            OrderProductTableMigration::class
        ];
    }
}
