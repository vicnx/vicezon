<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/vicezon/';
include($path . "model/ConnectionBD.php");
function select_one_product($id){
    $conn = new connection();
    $sql = "SELECT * FROM Tablets Where idproduct in ($id) ORDER BY idproduct ASC";
    $query = $conn->query($sql)->fetchAll();
    $conn =null;
    return $query;
}
function insert_cart($idproduct,$qty,$username){
    $conn= new connection();
    // $sql_check="SELECT * FROM cart WHERE username='$username' and idproduct ='$idproduct'";
    // $result_check=$conn->prepare($sql_check);//prepara la query con la connexion
    // $result_check->execute();//ejecuta la query
    // $rows=$result_check->rowCount(); //cuenta las filas que ha sacado
    // if ($rows>0){
    // $sql_delete="DELETE FROM cart where username='$username'";
    // $conn = new connection;
    // $query = $conn->query($sql_delete)->fetchObject();
    // }
    $sql_insert="INSERT INTO cart (username, idproduct, qty)
    VALUES ('$username','$idproduct','$qty')";
    $res=$conn->exec($sql_insert);
    $conn = null;
    return $res;
}
function only_delete_cart($username){
    $conn= new connection();
    $sql_delete="DELETE FROM cart where username='$username'";
    $conn = new connection;
    $query = $conn->query($sql_delete)->fetchObject();
    $conn = null;
    return $query;
}

function select_cart($username){
    $conn = new connection();
    $sql = "SELECT * FROM cart Where username='$username'";
    $query = $conn->query($sql)->fetchAll();
    $conn =null;
    return $query;
}

function check_stock($idproduct){
    $conn = new connection();
    $sql = "SELECT stock FROM Tablets Where idproduct='$idproduct'";
    $query = $conn->query($sql)->fetch();
    $conn =null;
    return $query;
}

function check_saldo($username){
    $conn = new connection();
    $sql = "SELECT saldo FROM `users` WHERE username='$username'";
    $query = $conn->query($sql)->fetch();
    $conn =null;
    return $query;
}

function update_saldo($username,$saldo){
    $conn= new connection();
    $sql_update="UPDATE users SET saldo='$saldo' where username='$username'";
    $conn = new connection;
    $query = $conn->query($sql_update)->fetchObject();
    $conn = null;
    return $query;
}
function update_stock($idproduct,$stock){
    $conn= new connection();
    $sql_update="UPDATE tablets SET stock='$stock' where idproduct='$idproduct'";
    $conn = new connection;
    $query = $conn->query($sql_update)->fetchObject();
    $conn = null;
    return $query;
}

function add_fac($username,$total,$fecha){
    $conn= new connection();
    $sql_update="INSERT INTO facturas (username,total_factura,fecha) VALUES ('$username','$total','$fecha')";
    $conn = new connection;
    $query = $conn->query($sql_update)->fetchObject();
    $conn = null;
    return $query;
}

function get_fac_id($username,$fecha){
    $conn = new connection();
    $sql = "SELECT idfactura FROM `facturas` WHERE username='$username' AND fecha='$fecha'";
    $query = $conn->query($sql)->fetch();
    $conn =null;
    return $query;
}
function add_line_fac($idfac,$idproduct,$qty,$cost){
    $conn= new connection();
    $sql_update="INSERT INTO factura_linea (idfactura,idproduct,qty,cost) VALUES ('$idfac','$idproduct','$qty','$cost')";
    $conn = new connection;
    $query = $conn->query($sql_update)->fetchObject();
    $conn = null;
    return $sql_update;
}

function get_price_product($idproduct){
    $conn = new connection();
    $sql = "SELECT price FROM `tablets` WHERE idproduct='$idproduct'";
    $query = $conn->query($sql)->fetch();
    $conn =null;
    return $query;
}
?>