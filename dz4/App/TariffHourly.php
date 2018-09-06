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

class TariffHourly extends BasicClass
{
    use CabinGPS;
    use AddDriver;

    private $distanceTariff = 0;
    private $timeTariff = 200;

    private function checkTime()
    {
        $this->time = ceil($this->time/60);
    }

    public function checkCost()
    {
        $this->checkTime();
        $this->result += $this->dinstance*$this->distanceTariff + $this->time*$this->timeTariff;
        $this->result *= $this->ageTariff;
        return $this->result;
    }
}
