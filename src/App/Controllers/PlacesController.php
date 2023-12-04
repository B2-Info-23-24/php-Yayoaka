<?php

namespace App\Controllers;

use App\Models\PlacesModel;

/**
 * brandsController
 */
class PlacesController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAllData(): array
    {
        $tDatas = $this->model->getPlaces();
        return $tDatas;
    }

    public function display($datas)
    {
        require(dirname(__DIR__) . "/Views/places.php");
        //FIXME : a remplacer par un appel de templating TWIG !
    }
}
