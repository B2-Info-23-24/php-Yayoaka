<?php

namespace App\Controllers;

/**
 * brandsController
 */
class BrandsController
{
	private $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function getAllData(): array
	{
		$tDatas = $this->model->getBrands();
		return $tDatas;
	}

	public function display($datas)
	{
		require(dirname(__DIR__) . "/Views/brands.php");
		//FIXME : a remplacer par un appel de templating TWIG !
	}
}
