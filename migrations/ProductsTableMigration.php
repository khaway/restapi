<?php

use App\Contracts\Migration as MigrationInterface;

/**
 * Class ProductsTableMigration
 */
class ProductsTableMigration extends Migration implements MigrationInterface
{
    /**
     * Run migration.
     *
     * @return false|int
     */
    public function run()
    {
        return $this->exec("CREATE TABLE `products` 
            ( 
                `id`    INT UNSIGNED NOT NULL auto_increment PRIMARY KEY, 
                `name`  VARCHAR(255) NOT NULL, 
                `price` DOUBLE(8, 2) NOT NULL 
            ) 
            
            DEFAULT CHARACTER SET utf8 COLLATE 'utf8_unicode_ci'"
        );
    }
}
