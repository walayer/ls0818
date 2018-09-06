<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 06.09.2018
 * Time: 13:58
 */

namespace App;

require_once 'BasicClass.php';
require_once 'CabinGPS.php';
require_once 'AddDriver.php';

class TariffDaily extends BasicClass
{
    use CabinGPS;
    use AddDriver;

    private $distanceTariff = 1;
    private $timeTariff = 1000; //за 24 часа

    private function checkTime()
    {
        $time1 = floor($this->time/(24*60));
        $time2 = $this->time - ($time1*(24*60));
        $time3 = ceil($this->time/(24*60));
        if ($time1 == 0) {
            $this->time = 1;
        } elseif ($time2 <= 29) {
            $this->time = $time1;
        } elseif ($time2 > 29) {
            $this->time = $time3;
        }
    }

    public function checkCost()
    {
        $this->checkTime();
        $this->result += $this->dinstance*$this->distanceTariff + $this->time*$this->timeTariff;
        $this->result *= $this->ageTariff;
        return $this->result;
    }
}
