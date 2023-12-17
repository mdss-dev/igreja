<?php
$banco = "igreja";
$servidor= "localhost";
$usuario= "root";
$senha= "";

$email_super_adm = "admin@admin.com";
$nome_igreja = "Igreja Casa de Oração para Todas as Nações";

date_default_timezone_set('America/Sao_Paulo');

try {
  $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
  echo "Erro ao conectar ao Banco de Dados!!! <br> <br>" .$e;
}

//INSERIR REGISTROS INICIAIS

//Criar um Pastor Presidente padrão
$query = $pdo->query("SELECT * FROM pr_presidente");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0){
$pdo->query("INSERT INTO pr_presidente SET nome = 'Super Administrador', email = '$email_super_adm', cpf = '000.000.000-00', telefone = '(00)00000-0000' ");
}

//Criar um Usuário Super com nivel de pr_presidente padrão
$query = $pdo->query("SELECT * FROM usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO usuarios SET nome = 'Super Administrador', email = '$email_super_adm', cpf = '000.000.000-00', senha = '123', nivel = 'pr_presidente', id_pessoa = 1 ");

//Criar variaveis padrões do sistema
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0){
$pdo->query("INSERT INTO config SET nome = 'email_super_adm', valor = '$email_super_adm' ");
$pdo->query("INSERT INTO config SET nome = 'nome_igreja', valor = '$nome_igreja' ");
}


//BUSCAR INFORMAÇÕES DE CONFIGURAÇÕES NO BANCO
$query = $pdo->query("SELECT * FROM config where nome = 'email_super_adm'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_super_adm = $res[0]['valor'];

$query = $pdo->query("SELECT * FROM config where nome = 'nome_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_igreja = $res[0]['valor'];


?>