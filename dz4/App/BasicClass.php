<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 06.09.2018
 * Time: 13:54
 */

namespace App;
require_once 'BasicInterface.php';

abstract class BasicClass implements BasicInterface
{
    protected $dinstance;
    protected $time;
    protected $age;
    protected $ageTariff;

    public $result = 0;

    public function __construct($dinstanceClient, $timeClient, $ageDriver, $addCabinGPS = false, $addDriver = false)
    {
        if ($addCabinGPS) {
            $this->result += CabinGPS::costSum($timeClient);
        }
        if ($addDriver) {
            $this->result += AddDriver::$cost;
        }

        $this->dinstance = $dinstanceClient;
        $this->time = $timeClient;
        $this->age = $ageDriver;
        $this->ageTariff = $this->checkAge($ageDriver);
    }

    protected function checkAge($age)
    {
        if (($age < 18) || ($age > 65)) {
            throw new \Exception(' Возраст водителя должен быть от 18 до 65!');
        } elseif (($age >= 18) && ($age <= 21)) {
            return 1.1;
        } else {
            return 1;
        }
    }
}
