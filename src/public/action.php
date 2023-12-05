<?php
require '../vendor/autoload.php';

use App\Core\Config;
use App\Models\UserModel;
use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\LoginModel;
use App\Models\PlaceModel;
use App\Models\UsersModel;
use App\Models\BrandsModel;
use App\Models\ColorsModel;
use App\Models\PlacesModel;
use App\Models\VehicleModel;
use App\Models\FreeDateModel;
use App\Models\VehiclesModel;
use App\Models\ReservationModel;
use App\Controllers\UserController;
use App\Controllers\BrandController;
use App\Controllers\ColorController;
use App\Controllers\LoginController;
use App\Controllers\PlaceController;
use App\Controllers\UsersController;
use App\Controllers\BrandsController;
use App\Controllers\ColorsController;
use App\Controllers\LogoutController;
use App\Controllers\PlacesController;
use App\Controllers\VehicleController;
use App\Controllers\FreeDateController;
use App\Controllers\VehiclesController;
use App\Controllers\ReservationController;

// Création de la connection PDO a la bdd
$config = new Config();
$pdo = null;
try {
	$pdo = $config->connectDB("phpscore");
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$currAction = "";
if (isset($_GET['do'])) {
	$currAction = $_GET['do'];
}




//if (isset($_GET['do']) && $_GET['do'] != "") {
switch ($currAction) {
	case "brands":
		$modelBrands = new BrandsModel($pdo);
		$ctrlBrands = new BrandsController($modelBrands);
		$tDatas = $ctrlBrands->getAllData();
		$ctrlBrands->display($tDatas);
		break;
	case "showbrand":
		$modelBrand = new BrandModel($pdo);
		$ctrlBrand = new BrandController($modelBrand);
		$idBrand = $_GET['id'];
		$ctrlBrand->displayBrand($idBrand);
		break;
	case "savebrand":
		$modelBrand = new BrandModel($pdo);
		$ctrlBrand = new BrandController($modelBrand);
		$ctrlBrand->saveBrand();
		break;
	case "delbrand":
		$modelBrand = new BrandModel($pdo);
		$ctrlBrand = new BrandController($modelBrand);
		$ctrlBrand->delBrand();
		break;
	case "colors":
		$modelColors = new ColorsModel($pdo);
		$ctrlColors = new ColorsController($modelColors);
		$tDatas = $ctrlColors->getAllData();
		$ctrlColors->display($tDatas);
		break;
	case "showcolor":
		$modelColor = new ColorModel($pdo);
		$ctrlColor = new ColorController($modelColor);
		$idColor = $_GET['id'];
		$ctrlColor->displayColor($idColor);
		break;
	case "savecolor":
		$modelColor = new ColorModel($pdo);
		$ctrlColor = new ColorController($modelColor);
		$ctrlColor->saveColor();
		break;
	case "delcolor":
		$modelColor = new ColorModel($pdo);
		$ctrlColor = new ColorController($modelColor);
		$ctrlColor->delColor();
		break;
	case "places":
		$modelPlaces = new PlacesModel($pdo);
		$ctrlPlaces = new PlacesController($modelPlaces);
		$tDatas = $ctrlPlaces->getAllData();
		$ctrlPlaces->display($tDatas);
		break;
	case "showplace":
		$modelPlace = new PlaceModel($pdo);
		$ctrlPlace = new PlaceController($modelPlace);
		$idPlace = $_GET['id'];
		$ctrlPlace->displayPlace($idPlace);
		break;
	case "saveplace":
		$modelPlace = new PlaceModel($pdo);
		$ctrlPlace = new PlaceController($modelPlace);
		$ctrlPlace->savePlace();
		break;
	case "delplace":
		$modelPlace = new PlaceModel($pdo);
		$ctrlPlace = new PlaceController($modelPlace);
		$ctrlPlace->delPlace();
		break;
	case "users":
		$modelUsers = new UsersModel($pdo);
		$ctrlUsers = new UsersController($modelUsers);
		$tDatas = $ctrlUsers->getAllData();
		$ctrlUsers->display($tDatas);
		break;
	case "showuser":
		$modelUser = new UserModel($pdo);
		$ctrlUser = new UserController($modelUser);
		$idUser = $_GET['id'];
		$ctrlUser->displayUser($idUser);
		break;
	case "saveuser":
		$modelUser = new UserModel($pdo);
		$ctrlUser = new UserController($modelUser);
		$ctrlUser->saveUser();
		break;
	case "deluser":
		$modelUser = new UserModel($pdo);
		$ctrlUser = new UserController($modelUser);
		$ctrlUser->delUser();
		break;
	case "vehicles":
		$modelVehicles = new VehiclesModel($pdo);
		$ctrlVehicles = new VehiclesController($modelVehicles);
		$tDatas = $ctrlVehicles->getAllData();
		$ctrlVehicles->display($tDatas);
		break;
	case "showvehicle":
		$modelVehicle = new VehicleModel($pdo);
		$ctrlVehicle = new VehicleController($modelVehicle);
		$idVehicle = $_GET['id'];
		$ctrlVehicle->displayVehicle($idVehicle);
		break;
	case "savevehicle":
		$modelVehicle = new VehicleModel($pdo);
		$ctrlVehicle = new VehicleController($modelVehicle);
		$ctrlVehicle->saveVehicle();
		break;
	case "delvehicle":
		$modelVehicle = new VehicleModel($pdo);
		$ctrlVehicle = new VehicleController($modelVehicle);
		$ctrlVehicle->delVehicle();
		break;


	case "home":
		$modelVehicles = new VehiclesModel($pdo);
		$modelBrand = new BrandsModel($pdo);
		$modelPlace = new PlacesModel($pdo);
		$ctrlVehicles = new VehiclesController($modelVehicles, $modelBrand, $modelPlace);
		$ctrlVehicles->getFilters();
		$tDatas = $ctrlVehicles->getAllData();
		$tBrands = $ctrlVehicles->getAllBrands();
		$tPlaces = $ctrlVehicles->getAllPlaces();
		$ctrlVehicles->displayFront($tDatas, $tBrands, $tPlaces);
		break;

	case "filtervehicles":
		$modelVehicles = new VehiclesModel($pdo);
		$modelBrand = new BrandsModel($pdo);
		$modelPlace = new PlacesModel($pdo);
		$ctrlVehicles = new VehiclesController($modelVehicles, $modelBrand, $modelPlace);
		$ctrlVehicles->getFilters();
		$tDatas = $ctrlVehicles->getAllData();
		$tBrands = $ctrlVehicles->getAllBrands();
		$tPlaces = $ctrlVehicles->getAllPlaces();
		$ctrlVehicles->displayFront($tDatas, $tBrands, $tPlaces);
		break;

	case "products":
		$modelVehicles = new VehiclesModel($pdo);
		$ctrlVehicles = new VehiclesController($modelVehicles);
		$tDatas = $ctrlVehicles->getAllData();
		$ctrlVehicles->displayFront($tDatas);
		break;
		// case "showproduct":
		// 	$modelVehicle = new VehicleModel($pdo);
		// 	$ctrlVehicle = new VehicleController($modelVehicle);
		// 	$idVehicle = $_GET['id'];
		// 	$ctrlVehicle->displayVehicleFront($idVehicle);
		// 	break;
	case "searchdate":
		$modelVehicle = new VehicleModel($pdo);
		$modelNotFreeDate = new FreeDateModel($pdo);
		$ctrlVehicle = new FreeDateController($modelVehicle, $modelNotFreeDate);
		$idVehicle = $_GET['id'];
		$dateMonth = date("Y-m");
		var_dump($_GET);
		if (isset($_GET['month'])) {
			$dateMonth = $_GET['month'];
		}
		$tNotFree = $ctrlVehicle->getFreeDates($dateMonth, $idVehicle);
		$ctrlVehicle->display($tNotFree, $idVehicle, $dateMonth);
		break;
	case "reservation":
		$modelVehicle = new ReservationModel($pdo);
		$ctrlVehicle = new ReservationController($modelVehicle);
		$idVehicle = $_POST['id'];
		$dateMonth = $_POST['month'];
		$tResaDays = $_POST['resa_days'];
		var_dump($_POST);
		$ctrlVehicle->saveReservations($idVehicle,  $dateMonth, $tResaDays);
		$ctrlVehicle->display($idVehicle, $dateMonth, $tResaDays); // view ORDER
		break;

	case "login":
		$modelLogin = new loginModel($pdo);
		$ctrlLogin = new LoginController($modelLogin);
		$ctrlLogin->login();
		$ctrlLogin->displayHome();
		break;
	case "logout":
		$ctrlLogout = new LogoutController();
		$ctrlLogout->Logout();
		$ctrlLogout->displayHome();
		break;
	case "showfrontuser":
		$modelUser = new UserModel($pdo);
		$ctrlUser = new UserController($modelUser);
		$idUser = $_GET['id'];
		$ctrlUser->displayUserFront($idUser);
		break;

	default:
		$modelVehicles = new VehiclesModel($pdo);
		$ctrlVehicles = new VehiclesController($modelVehicles);
		$tDatas = $ctrlVehicles->getAllData();
		$ctrlVehicles->displayFront($tDatas);
		break;
}
// } else {
// 	//si le do est vide ou non-renseigné
// 	require("index.php");
// }
