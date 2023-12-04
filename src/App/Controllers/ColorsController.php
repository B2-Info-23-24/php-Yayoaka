<?php

namespace App\Controllers;

use App\Models\ColorsModel;

/**
 * brandsController
 */
class ColorsController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAllData(): array
    {
        $tDatas = $this->model->getColors();
        return $tDatas;
    }

    public function display($datas)
    {
        require(dirname(__DIR__) . "/Views/colors.php");
        //FIXME : a remplacer par un appel de templating TWIG !
    }
}
