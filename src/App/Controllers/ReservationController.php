<?php

namespace App\Controllers;


/**
 * brandsController
 */
class ReservationController
{
    private $model;
    private $modelVehicle;
    private $tCurrResas;

    public function __construct($model, $modelVehicle = null)
    {
        $this->model = $model;
        $this->modelVehicle = $modelVehicle;
    }

    public function saveReservations($idVehicle, $currMonth, $tResaDays)
    {
        $this->tCurrResas = $this->model->saveReservations($idVehicle, $currMonth, $tResaDays);
    }

    public function updResasState($tResaIds, $state = 0)
    {
        $this->model->updResasState($tResaIds, $state);
    }

    public function getUserResas()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $userId = $_SESSION['user_logged'];
        $tMyResas = $this->model->getResaByUser($userId);
        return $tMyResas;
    }

    public function display($idVehicle, $dateMonth, $tResaDays)
    {
        $currVehic  = "";
        if ($idVehicle > 0) {
            $currVehic  = $this->modelVehicle->getVehicle($idVehicle);
        }
        $tResas = array();
        if (isset($this->tCurrResas)) {
            $tResas =  $this->model->getResas($this->tCurrResas);
        }
        //var_dump($tResas);
        require(dirname(__DIR__) . "/Views/reservation.php");
    }
}
