<?php

    /**
     * Application Endpoint
     */

    session_start();

    if(!isset($_SESSION['isAuth'])) $_SESSION['isAuth'] = false;

    if(!$_SESSION['isAuth']){
        http_response_code(401);
        exit;
    }

    require_once(__DIR__.'\..\controller\controller.php');



    $controller = new Controller();


    



?>