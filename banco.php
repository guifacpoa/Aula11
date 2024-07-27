<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define("PASSWORD", 'flexxo');
define('DATABASE', 'sorteio');
$link = false;

function conexao(){
    global $link;
    $link = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
}

function execute($sql){
    global $link;
    $resultado = mysqli_query($link, $sql);
    return $resultado;
}

function busca_id(){
    global $link;
    $id = mysqli_insert_id($link);
    return $id;
}