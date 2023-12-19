<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');


date_default_timezone_set('America/Sao_Paulo');

//dados do banco no servidor local
$banco = "igreja";
$servidor = "localhost";
$usuario = "root";
$senha = "";

//dados do banco no servidor remoto

/*
$banco = "hugocu75_igreja";
$servidor = "sh-pro24.hostgator.com.br";
$usuario = "hugocu75_igreja";
$senha = "hugoigreja";
*/

try {
  $pdo = new PDO("mysql:dbname=$banco; host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
  echo 'Erro ao conectar com o banco!!' . $e;
}
