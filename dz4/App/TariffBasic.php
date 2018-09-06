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

class TariffBasic extends BasicClass
{
    use CabinGPS;

    private $distanceTariff = 10;
    private $timeTariff = 3;

    public function checkCost()
    {
        $this->result += $this->dinstance*$this->distanceTariff + $this->time*$this->timeTariff;
        $this->result *= $this->ageTariff;
        return $this->result;
    }
}
