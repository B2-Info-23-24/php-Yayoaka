<?php

namespace App\Controllers;

/**
 * brandsController
 */
class UsersController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAllData(): array
    {
        $tDatas = $this->model->getUsers();
        return $tDatas;
    }

    public function display($datas)
    {
        require(dirname(__DIR__) . "/Views/usersBO.php");
        //FIXME : a remplacer par un appel de templating TWIG !
    }

    public function displayFront($datas)
    {
        require(dirname(__DIR__) . "../../public/indexuserfront.php");
        //FIXME : a remplacer par un appel de templating TWIG !
    }
}
