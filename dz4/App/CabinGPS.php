<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 06.09.2018
 * Time: 13:42
 */

namespace App;

trait CabinGPS
{
    static private $price = 15;
    public function costSum($time)
    {
        if ($time <= 0) {
            $time = 1;
        }
        $cost = self::$price*ceil($time);
        return $cost;
    }
}
