<?php

namespace App\Controllers;


/**
 * brandsController
 */
class ReservationController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function saveReservations($idVehicle, $currMonth, $tResaDays)
    {
        $this->model->saveReservations($idVehicle, $currMonth, $tResaDays);
    }

    public function display($idVehicle, $dateMonth, $tResaDays)
    {
        // $name = "";
        // if ($id > 0) {
        //     $name = $this->model->getBrand($id);
        // }
        require(dirname(__DIR__) . "/Views/reservation.php");
    }
}
