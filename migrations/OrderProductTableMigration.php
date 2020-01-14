<?php

use App\Contracts\Migration as MigrationInterface;

/**
 * Class OrderProductTableMigration
 */
class OrderProductTableMigration extends Migration implements MigrationInterface
{
    /**
     * Run migration.
     *
     * @return false|int
     */
    public function run()
    {
        return $this->exec("CREATE TABLE `order_product` 
              ( 
                 `id`         BIGINT UNSIGNED NOT NULL auto_increment PRIMARY KEY, 
                 `order_id`   INT UNSIGNED NOT NULL, 
                 `product_id` INT UNSIGNED NOT NULL 
              ) 
            
            DEFAULT CHARACTER SET utf8 COLLATE 'utf8_unicode_ci'
        ");
    }
}
