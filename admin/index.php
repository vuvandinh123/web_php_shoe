 <?php

// date_default_timezone_set('asia/HoChiMinh');

require_once('../vendor/autoload.php');
require_once('../config/database.php');
use App\Libraries\Route;
session_start();
if (!isset($_SESSION['useradmin']))
{
     header('location:login.php');
}
Route::route_admin();

