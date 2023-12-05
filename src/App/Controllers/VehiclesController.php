<?php

namespace App\Controllers;

/**
 * brandsController
 */
class VehiclesController
{
    private $model;
    private $modelBrand;
    private $filterBrand;
    private $modelPlace;
    private $filterPlace;

    public function __construct($model, $modelBrand = null, $modelPlace = null)
    {
        $this->model = $model;
        $this->modelBrand = $modelBrand;
        $this->modelPlace = $modelPlace;
        echo "contruct ";
    }

    public function getFilters()
    {
        $this->filterBrand = 0;
        if (isset($_GET["filterb"])) :
            $this->filterBrand = $_GET["filterb"];
        endif;

        $this->filterPlace = 0;
        if (isset($_GET["filterp"])) :
            $this->filterPlace = $_GET["filterp"];
        endif;
        // echo "fiterp  : " . $this->filterPlace;
    }

    public function getAllData(): array
    {
        $tDatas = $this->model->getVehicles($this->filterBrand, $this->filterPlace);
        return $tDatas;
    }

    public function getAllBrands(): array
    {
        $tBrands = $this->modelBrand->getBrands();
        return $tBrands;
    }

    public function getAllPlaces(): array
    {
        $tPlaces = $this->modelPlace->getPlaces();
        return $tPlaces;
    }

    public function display($datas)
    {
        require(dirname(__DIR__) . "/Views/vehiclesBO.php");
    }

    public function displayFront($datas, $tBrands = null, $tPlaces = null)
    {
        require(dirname(__DIR__) . "/../public/indexfront.php");
    }
}
