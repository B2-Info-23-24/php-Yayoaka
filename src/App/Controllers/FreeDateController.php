<?php

namespace App\Controllers;


/**
 * brandsController
 */
class FreeDateController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getFreeDates($currMonth, $idVehicle): array
    {
        $tFreeDatas = $this->model->getFreeDates($currMonth, $idVehicle);
        return $tFreeDatas;
    }

    public function display($tNotFree, $idVehicle, $dateMonth)
    {
        // TODO Header vers la page du produit
    }
}
