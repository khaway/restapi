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

        // $this->exec("ALTER TABLE `order_product`
        //       ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`)
        //       REFERENCES `orders` (`id`)");
        //
        // $this->exec("ALTER TABLE `order_product`
        //       ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`)
        //       REFERENCES `products` (`id`)");
    }
}
