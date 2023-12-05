<?php

namespace App\Controllers;


/**
 * brandsController
 */
class FreeDateController
{
    private $modelVehicle;
    private $modelDates;

    public function __construct($modelVehicle, $modelDates)
    {
        $this->modelVehicle = $modelVehicle;
        $this->modelDates = $modelDates;
    }

    public function getFreeDates($currMonth, $idVehicle): array
    {
        $tFreeDatas = $this->modelDates->getNotFreeDates($currMonth, $idVehicle);
        return $tFreeDatas;
    }

    public function display($tNotFree, $idVehicle, $dateMonth)
    {
        $currVehic = array();
        if ($idVehicle > 0) {
            $currVehic = $this->modelVehicle->getVehicle($idVehicle);
        } else {
            echo "Error vehicle #" . $idVehicle . " not found";
            return;
        }

        require(dirname(__DIR__) . "/Views/vehicle.php");
    }
}
