<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'vuvandinh_2121110393',
    'username' => 'root',
    'password' => '06012003',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => 'vvd_',
]);

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

$capsule->setAsGlobal();

$capsule->bootEloquent();

?>