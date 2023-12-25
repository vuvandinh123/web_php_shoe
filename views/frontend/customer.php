<?php

$f = $_REQUEST['f']??'';

switch ($f) {
    case 'login':{
        require_once('views/frontend/customer-login.php');
            break;
    }
    case 'logout':{
            session_destroy();
            header('location:?option=customer&f=login');
        // require_once('views/frontend/customer-logout.php');
            break;
    }
    case 'register':{
        require_once('views/frontend/customer-register.php');
            break;
    }
    case 'profile':{
        require_once('views/frontend/customer-profile.php');
            break;
    }
    case 'logup':{
        require_once('views/frontend/customer-logup.php');
            break;
    }
    default:
    {
            echo '404';
            break;
    }

}