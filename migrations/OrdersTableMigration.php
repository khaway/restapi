<?php

use App\Contracts\Migration as MigrationInterface;

use App\Entities\Order;

/**
 * Class OrdersTableMigration
 */
class OrdersTableMigration extends Migration implements MigrationInterface
{
    /**
     * Run migration.
     *
     * @return false|int
     */
    public function run()
    {
        $statusNew = Order::STATUS_NEW;
        $statusPaid = Order::STATUS_PAID;

        return $this->exec("CREATE TABLE `orders` 
              ( 
                 `id`      BIGINT UNSIGNED NOT NULL auto_increment PRIMARY KEY, 
                 `user_id` INT UNSIGNED NOT NULL, 
                 `status`  ENUM('{$statusNew}', '{$statusPaid}') NOT NULL DEFAULT '{$statusNew}' 
              ) 

            DEFAULT CHARACTER SET utf8 COLLATE 'utf8_unicode_ci'
        ");
    }
}
