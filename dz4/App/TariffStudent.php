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

class TariffStudent extends BasicClass
{
    use CabinGPS;

    private $distanceTariff = 4;
    private $timeTariff = 1;

    private function checkAgeStudent()
    {
        if ($this->age > 25) {
            throw new \Exception('Водитель старше 25!');

        }
    }

    public function checkCost()
    {
        $this->checkAgeStudent();
        $this->result += $this->dinstance*$this->distanceTariff + $this->time*$this->timeTariff;
        $this->result *= $this->ageTariff;
        return $this->result;
    }
}
