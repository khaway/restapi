<?php

namespace App\Services;

use App\Exceptions\MigrationServiceException;

/**
 * Class MigrationService
 *
 * @package App\Services
 */
class MigrationService
{
    /**
     * Run given migrations.
     *
     * @param $migrations
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws MigrationServiceException
     */
    public function migrate($migrations): array
    {
        $migrations = array_wrap($migrations);
        $migrated = [];

        foreach ($migrations as $migration) {
            $migrated[$migration] = $this->runMigration($migration);
        }

        return $migrated;
    }

    /**
     * Run single migration.
     *
     * @param $migration
     * @return mixed
     * @throws MigrationServiceException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function runMigration($migration)
    {
        if (class_exists($migration)) {
            $migration = app()->make($migration);
        }

        if (! $migration instanceof \Migration) {
            throw new MigrationServiceException("Can't run migration, invalid migration given");
        }

        return app()->call([$migration, 'run']);
    }
}
