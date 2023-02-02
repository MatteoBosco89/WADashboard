<?php

    /**
     * Application Endpoint
     */
    ini_set("display_errors", 1); // if production set 0
    session_start();

    if(!isset($_SESSION['isAuth'])) $_SESSION['isAuth'] = false;

    if(!$_SESSION['isAuth']){
        http_response_code(401);
        exit;
    }

    require_once(__DIR__.'\..\controller\controller.php');



    $controller = new Controller();


    



?>