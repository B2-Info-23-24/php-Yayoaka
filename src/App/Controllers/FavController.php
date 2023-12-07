<?php

namespace App\Controllers;


/**
 * brandsController
 */
class FavController
{
    private $model;


    public function __construct($model)
    {
        $this->model = $model;
    }

    public function AddFav($idVehicle)
    {
        $this->model->AddFav($idVehicle);
    }
}
