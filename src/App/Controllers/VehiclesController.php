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
    private $modelColor;
    private $filterColor;
    private $filterPrice;

    public function __construct($model, $modelBrand = null, $modelPlace = null, $modelColor = null)
    {
        $this->model = $model;
        $this->modelBrand = $modelBrand;
        $this->modelPlace = $modelPlace;
        $this->modelColor = $modelColor;
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

        $this->filterColor = 0;
        if (isset($_GET["filterc"])) :
            $this->filterColor = $_GET["filterc"];
        endif;

        $this->filterPrice = 0;
        if (isset($_GET["filterpr"])) :
            $this->filterPrice = $_GET["filterpr"];
        endif;
    }

    public function getAllData(): array
    {
        $tDatas = $this->model->getVehicles($this->filterBrand, $this->filterPlace, $this->filterColor, $this->filterPrice);
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

    public function getAllColors(): array
    {
        $tColors = $this->modelColor->getColors();
        return $tColors;
    }

    public function display($datas)
    {
        require(dirname(__DIR__) . "/Views/vehiclesBO.php");
    }

    public function displayFront($datas, $tBrands = null, $tPlaces = null, $tColors = null)
    {
        require(dirname(__DIR__) . "/../public/indexfront.php");
    }
}
