<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Migration
 */
class Migration
{
    /**
     * Capsule instance.
     *
     * @var Capsule
     */
    protected $capsule;

    /**
     * Migration constructor.
     *
     * @param Capsule $capsule
     */
    public function __construct(Capsule $capsule)
    {
        $this->capsule = $capsule;
    }

    /**
     * Execute raw sql.
     *
     * @param $rawSql
     * @return false|int
     */
    public function exec($rawSql)
    {
        return $this->capsule
            ->getConnection()
            ->getPdo()
            ->exec($rawSql);
    }
}
