<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/vicezon/';
include($path . "module/client/module/search/model/searchDAO.php");
 switch($_GET['op']){
     case 'readbrandsdb':
        $searchDAO = new searchDAO();
        $rdo = $searchDAO->readbrands();
        echo json_encode($rdo);
        exit;
        break;
    case 'autocomplete':
        $valor=$_GET['busqueda'];
        $searchDAO = new searchDAO();
        $rdo = $searchDAO->automplete($valor);
        echo json_encode($rdo);
        exit;
        break;
 }
?>